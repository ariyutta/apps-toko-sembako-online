<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPesananController extends Controller
{
    public function data_pesanan() {
        $title_admin = 'Data Pesanan';

        return view('admins.data_pesanan.index', compact('title_admin'));
    }
}
