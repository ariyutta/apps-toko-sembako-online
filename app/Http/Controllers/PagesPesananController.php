<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesPesananController extends Controller
{
    public function status_pesanan() { 
        $title_user = 'Status Pesanan';
        $user_login = Auth::user()->id;

        $data_pesanan = DataPesanan::where('user_id', Auth::user()->id)->where('status_pesanan', '!=',1)->get();

        return view('users.status_pesanan', compact('title_user','data_pesanan'));
    }

    public function detail_status_pesanan($id) { 
        $title_user = 'Detail Status Pesanan';
        $user_login = Auth::user()->id;

        $data_pesanan = DataPesanan::find($id);

        return view('users.detail_status_pesanan', compact('title_user','data_pesanan'));
    }

    public function konfirmasi_pesanan() { 
        $title_user = 'Konfirmasi Pesanan';

        return view('users.konfirmasi_pesanan', compact('title_user'));
    }
}
