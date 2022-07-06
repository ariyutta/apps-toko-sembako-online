<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKeranjang;
use App\Models\DataPesanan;
use App\Models\DataPesananDetail;
use App\Models\DataWilayah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesCheckoutController extends Controller
{
    public function checkout() {
        $title_user = 'Checkout Pesanan';
        $user_login = Auth::user();
        $get_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->get();

        $provinsi = DataWilayah::where('nama_wilayah', 'LIKE', '%Prov.%')->get();
        $kota = DataWilayah::where('nama_wilayah', 'LIKE', '%Kota%')->get();

        $total = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->sum('jumlah_harga');

        $ongkos_kirim = $total * 0.5 / 100;
        $total_all = $total + $ongkos_kirim;

        return view('users.checkout', compact('title_user','provinsi','kota','total','ongkos_kirim','total_all','get_keranjang'));
    }

    public function submit_checkout(Request $request) {
        $user_login = Auth::user();
        $tanggal = Carbon::now();
        $keranjang_get = DataKeranjang::where('user_id', Auth::user()->id)->where('status_keranjang', 1)->get();

        $pesanan = new DataPesanan;
        $pesanan->user_id = $user_login->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->status_pesanan = 0;
        $pesanan->status_pembayaran = 0;
        $pesanan->jumlah_harga = 0;
        $pesanan->kode_pesanan = 'KDP-'.mt_rand(100, 999);
        $pesanan->save();

        // Simpan Data Inputan Keranjang ke Pesanan Detail
        $pesanan_baru = DataPesanan::where('user_id', Auth::user()->id)->where('status_pesanan', 0)->orderby('created_at','DESC')->first();
            foreach($keranjang_get as $cart) {
                $pesanan_detail = new DataPesananDetail();
                $pesanan_detail->barang_id = $cart->barang_id;
                $pesanan_detail->pesanan_id = $pesanan_baru->id;
                $pesanan_detail->jumlah_item = $cart->jumlah_barang;
                $pesanan_detail->total_harga_barang = $cart->jumlah_harga;
                $pesanan_detail->save();
            }

        $pesanan_details = DataPesananDetail::where('pesanan_id', $pesanan->id)->get();
            foreach ($pesanan_details as $pesanan_detail) {
                $barang = DataBarang::where('id', $pesanan_detail->barang_id)->first();
                $barang->stok = $barang->stok - $pesanan_detail->jumlah_item;
                $barang->terjual = $barang->terjual + $pesanan_detail->jumlah_item;
                $barang->update();
            }
        
        $status_wishlist = DataKeranjang::where('user_id', Auth::user()->id)->where('status_keranjang', 1)->get();
            foreach($status_wishlist as $del_wish) {
                $del_wish->status_keranjang = 0;
                $del_wish->update();
            }
        
        Alert::success('Berhasil', 'Selamat barang anda berhasil dipesan!');
        return redirect('dashboard/status_pesanan');
    }
}
