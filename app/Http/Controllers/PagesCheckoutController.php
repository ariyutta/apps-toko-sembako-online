<?php

namespace App\Http\Controllers;

use App\Models\DataKeranjang;
use App\Models\DataWilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        // Update Multi Pesanan
        $query = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1,
        ])->get();

        $jam_hari_ini = date('Y-m-d H:i:s');

            foreach($query as $list) {
                $data_pesanan[] = array(
                    'user_id'   => $user_login->id,
                    'barang_id' => $list->barang_id,
                    'nama_barang' => $list->barang->nama_barang,
                    'jumlah_item' => $list->jumlah_barang,
                    'provinsi_id' => $request->provinsi,
                    'kota_id' => $request->kota,
                    'no_telp' => $request->no_telp,
                    'alamat' => $request->alamat,
                    'pesan' => $request->pesan,
                    'jenis_pengiriman_id' => $request->jenis_pengiriman,
                    'total_harga_barang' => $list->barang->harga_jual,
                    'ongkos_kirim' => $list->barang->harga_jual * 0.5 / 100,
                    'total_harga_seluruh' => $list->barang->harga_jual + ($list->barang->harga_jual * 0.5 / 100),
                    'status_pesanan' => 1,
                    'status_pembayaran' => 1,
                    'kode_pesanan' => mt_rand(100, 999),
                    'created_at' => $jam_hari_ini,
                    'updated_at' => $jam_hari_ini
                );
            }

        DB::table('data_pesanan')->insert($data_pesanan);
        
        Alert::success('Berhasil', 'Selamat barang anda telah di checkout!');
        return redirect('dashboard/status_pesanan');
    }
}
