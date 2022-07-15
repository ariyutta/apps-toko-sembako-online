<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use App\Models\ReturPenjualan;
use Illuminate\Http\Request;

class ReturPenjualanController extends Controller
{
    public function retur_penjualan() {
        $title_admin = 'Retur Penjualan';
        $retur_penjualan = ReturPenjualan::orderby('created_at','DESC')->get();

        return view('admins.retur_penjualan.index', compact('title_admin','retur_penjualan'));
    }
}
