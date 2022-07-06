<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use App\Models\DataPesananDetail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PagesPembayaranController extends Controller
{
    public function pembayaran_pesanan($id) { 
        $title_user = 'Pembayaran Pesanan';
        $data_pesanan = DataPesanan::find($id);
        $total_pesanan = DataPesananDetail::where('pesanan_id', $data_pesanan->id)->sum('total_harga_barang');

        return view('users.pembayaran_pesanan', compact('title_user','data_pesanan','total_pesanan'));
    }

    public function submit_pembayaran() {

        Alert::success('Berhasil', 'Selamat pembayaran anda telah berhasil!');
        return redirect('dashboard/keranjang');
    }
}
