<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\DataBarang;
use App\Models\DataKeranjang;
use App\Models\DataPesanan;
use App\Models\DataPesananDetail;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesBeliSekarangController extends Controller
{
    public function checkout(Request $request, $id) {
        $title_user = 'Beli Sekarang';
        $user_login = Auth::user();
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();
        $kota = City::all();

        $data_barang = DataBarang::find($id);

        // Get Data Barang yang dibeli
        $b_id             = $data_barang->id;
        $b_kode_barang    = $data_barang->kode_barang;
        $b_nama_barang    = $data_barang->nama_barang;
        $b_jumlah_barang  = $request->jumlah_barang;
        $b_harga_jual     = $data_barang->harga_jual;
        $b_gambar_barang  = $data_barang->gambar_barang;

        $jumlah_barang = $request->jumlah_barang;
        $jumlah_harga = $jumlah_barang * $data_barang->harga_jual;
        $harga_ongkir = 0;
        $jenis_pengiriman = $request->jenis_pengiriman;

        $total_all = $jumlah_harga + $harga_ongkir;

        return view('users.pages_beli_sekarang.checkout', compact('title_user','kota','notif_cart','total_all','jumlah_barang','b_id','b_kode_barang','b_nama_barang','b_jumlah_barang','b_harga_jual','b_gambar_barang'));
    }

    public function processShipping(Request $request) {

        // return $request->all();

        // Get Data Barang yang dibeli
        $brg_id             = $request->b_id_hide;
        $brg_kode_barang    = $request->b_kode_barang_hide;
        $brg_nama_barang    = $request->b_nama_barang_hide;
        $brg_jumlah_barang  = $request->b_jumlah_barang_hide;
        $brg_harga_jual     = $request->b_harga_jual_hide;
        $brg_gambar_barang  = $request->b_gambar_barang_hide;

        $jenis_kirim        = $request->jenis_pengiriman;

        // Harga Total Barang yang dibeli
        $harga_total_barang = $brg_jumlah_barang * $brg_harga_jual;

        $title_user = 'Beli Sekarang';
        $user_login = Auth::user();
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();
        $kota = City::all();

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

        $layanan = 'Reguler';
        $harga_seluruh = $harga_total_barang + $harga_ongkir;
        
        return view('users.pages_beli_sekarang.checkout2', compact('title_user','kota','notif_cart','origin','destination','harga_ongkir','estimasi','layanan','brg_id','brg_kode_barang','brg_nama_barang','brg_gambar_barang','brg_jumlah_barang','harga_total_barang','harga_seluruh','jenis_kirim'));
    }

    public function submit_checkout2(Request $request) {
        $user_login = Auth::user();

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
        $pesanan->jumlah_harga = $request->jumlah_harga_hide;
        $pesanan->jumlah_ongkir = $request->harga_ongkir_hide;
        $pesanan->jumlah_total = $request->jumlah_seluruh_hide;
        $pesanan->keterangan = $request->pesan;
        $pesanan->save();

        // Simpan Data Inputan Keranjang ke Pesanan Detail
        $pesanan_baru = DataPesanan::where('user_id', Auth::user()->id)->where('status_pesanan', 0)->orderby('created_at','DESC')->first();
            $pesanan_detail = new DataPesananDetail;
            $pesanan_detail->barang_id = $request->brg_id_hide;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->nama_barang = $request->brg_nama_barang_hide;
            $pesanan_detail->jumlah_item = $request->brg_jumlah_item_hide;
            $pesanan_detail->total_harga_barang = $request->jumlah_harga_hide;
            $pesanan_detail->save();

        $pesanan_details = DataPesananDetail::where('pesanan_id', $pesanan->id)->get();
            foreach ($pesanan_details as $pesanan_detail) {
                $barang = DataBarang::where('id', $pesanan_detail->barang_id)->first();
                $barang->stok = $barang->stok - $pesanan_detail->jumlah_item;
                $barang->terjual = $barang->terjual + $pesanan_detail->jumlah_item;
                $barang->update();
            }
        
        Alert::success('Berhasil', 'Selamat barang anda berhasil dipesan!');
        return redirect('home/status_pesanan');
    }
}
