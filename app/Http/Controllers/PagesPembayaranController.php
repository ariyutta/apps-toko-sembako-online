<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PagesPembayaranController extends Controller
{
    public function pembayaran_pesanan() { 
        $title_user = 'Pembayaran Pesanan';

        return view('users.pembayaran_pesanan', compact('title_user'));
    }

    public function submit_pembayaran() {

        Alert::success('Berhasil', 'Selamat pembayaran anda telah berhasil!');
        return redirect('dashboard/keranjang');
    }
}
