<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\DataBarang;
use App\Models\DataKeranjang;
use App\Models\DataPesanan;
use App\Models\DataPesananDetail;
use App\Models\DataWilayah;
use App\Models\Province;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesCheckoutController extends Controller
{
    public function checkout() {
        $title_user = 'Checkout Pesanan';
        $user_login = Auth::user();
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $get_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->get();
        
        $kota = City::all();

        $total = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->sum('jumlah_harga');
        
        $harga_ongkir = 0;
        $total_all = $total;

        if(!empty($harga_ongkir)) {

            Alert::error('Gagal', 'Anda harus tentukan harga ongkos kirim terlebih dahulu!');
            return redirect()->back();
        }

        return view('users.checkout', compact('title_user','kota','total','total_all','get_keranjang','notif_cart','harga_ongkir'));
    }

    public function processShipping(Request $request) {
        $title_user = 'Checkout Pesanan';
        $user_login = Auth::user();
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();
        $kota = City::all();

        $get_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->get();

        $total = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->sum('jumlah_harga');

        $client = new Client();

        try {
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
                [
                    // 'body' => 'origin='.$request->origin.'&destination='.$request->destination.'&weight=500&courier=jne',
                    'body' => 'origin=417&destination='.$request->destination.'&weight=500&courier=jne',
                    'headers' => [
                        'key' => '244aae4ed5aa56ef039c7c26c08bee2d',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ]
                ]
            );
        } catch(RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);
        // print_r($array_result);

        $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];

        for($i=0; $i<count($array_result["rajaongkir"]["results"][0]["costs"]); $i++){
            $harga_ongkir = $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"];
            $estimasi = $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"];
        }

        if(empty($harga_ongkir)) {

            Alert::error('Gagal', 'Anda harus tentukan harga ongkos kirim terlebih dahulu!');
            return redirect()->back();
        }

        $harga_ongkir;
        $estimasi;
        $layanan = 'Reguler';
        $jenis_pengiriman = $request->jenis_pengiriman;

        $total_all = $total + $harga_ongkir;

        return view('users.checkout', compact('title_user','origin','destination','array_result','kota','get_keranjang','total','total_all','notif_cart','harga_ongkir','estimasi','layanan','jenis_pengiriman'));
    }

    public function submit_checkout(Request $request) {
        $user_login = Auth::user();
        $keranjang_get = DataKeranjang::where('user_id', Auth::user()->id)->where('status_keranjang', 1)->get();

        // return $request->all();
        $count = DataPesanan::where('user_id', Auth::user()->id)->where('status_pesanan', 0)->count();
        $pesanan = new DataPesanan;
        $pesanan->user_id = $user_login->id;
            if($count < 10) {
                $pesanan->kode_pesanan = 'KDP-'.Auth::user()->id.'-000'.$count +1;
            } else if($count > 10 ) {
                $pesanan->kode_pesanan = 'KDP-'.Auth::user()->id.'-00'.$count +1;
            } else if($count > 99 ) {
                $pesanan->kode_pesanan = 'KDP-'.Auth::user()->id.'-0'.$count +1;
            } else if($count > 999 ) {
                $pesanan->kode_pesanan = 'KDP-'.Auth::user()->id.'-'.$count +1;
            }
        $pesanan->loc_pengirim = $request->origin_hide;
        $pesanan->loc_penerima = $request->destination_hide;
        $pesanan->layanan = $request->layanan_hide;
        $pesanan->jenis_pengiriman = $request->jenis_pengiriman_hide;
        $pesanan->status_pesanan = 0;
        $pesanan->status_pembayaran = 0;
        $pesanan->jumlah_harga = $request->total_hide;
        $pesanan->jumlah_ongkir = $request->ongkos_kirim_hide;
        $pesanan->jumlah_total = $request->total_harga_hide;
        $pesanan->keterangan = $request->pesan;
        $pesanan->save();

        // Simpan Data Inputan Keranjang ke Pesanan Detail
        $pesanan_baru = DataPesanan::where('user_id', Auth::user()->id)->where('status_pesanan', 0)->orderby('created_at','DESC')->first();
            foreach($keranjang_get as $cart) {
                $pesanan_detail = new DataPesananDetail;
                $pesanan_detail->barang_id = $cart->barang_id;
                $pesanan_detail->pesanan_id = $pesanan_baru->id;
                $pesanan_detail->nama_barang = $cart->barang->nama_barang;
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
        return redirect('home/status_pesanan');
    }
}
