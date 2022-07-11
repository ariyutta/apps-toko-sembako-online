<?php

namespace App\Http\Controllers;

use App\Models\DataKeranjang;
use App\Models\DataPesanan;
use App\Models\DataPesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesPesananController extends Controller
{
    public function status_pesanan() { 
        $title_user = 'Status Pesanan';
        $user_login = Auth::user()->id;
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_pesanan = DataPesanan::where('user_id', Auth::user()->id)->orderby('created_at','DESC')->get();

        return view('users.pages_pesanan.status_pesanan', compact('title_user','data_pesanan','notif_cart'));
    }

    public function detail_status_pesanan($id) { 
        $title_user = 'Detail Status Pesanan';
        $user_login = Auth::user()->id;
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_pesanan = DataPesanan::find($id);
        $total_pesanan = DataPesananDetail::where('pesanan_id', $data_pesanan->id)->sum('total_harga_barang');

        return view('users.pages_pesanan.detail_status_pesanan', compact('title_user','data_pesanan','total_pesanan','notif_cart'));
    }

    public function confirm_terima_pesanan($id) { 
        $data = DataPesanan::find($id);

        $data->update([
            'status_pesanan' => 1
        ]);

        Alert::success('Berhasil', 'Barang pada Kode Pesanan '.$data->kode_pesanan.' sudah berhasil diterima!');
        return redirect()->back();

        return view('users.pages_pesanan.detail_status_pesanan/'.$data->id.'', compact('title_user'));
    }
}
