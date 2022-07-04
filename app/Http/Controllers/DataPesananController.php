<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use Illuminate\Http\Request;

class DataPesananController extends Controller
{
    public function data_pesanan() {
        $title_admin = 'Data Pesanan';
        $data_pesanan = DataPesanan::all();

        return view('admins.data_pesanan.index', compact('title_admin','data_pesanan'));
    }
}
