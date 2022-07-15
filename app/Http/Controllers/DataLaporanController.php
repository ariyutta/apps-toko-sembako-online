<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKeranjang;
use App\Models\DataPembelian;
use App\Models\DataPesananDetail;
use App\Models\User;
use Illuminate\Http\Request;

class DataLaporanController extends Controller
{
    public function laporan() {
        $title_admin = 'Laporan';

        return view('admins.data_laporan.index', compact('title_admin'));
    }

    public function laporan_penjualan() {
        $title_admin = 'Laporan Penjualan';
        $data_detail = DataPesananDetail::orderby('created_at','DESC')->get();

        return view('admins.data_laporan.penjualan', compact('title_admin','data_detail'));
    }

    public function daftar_pelanggan() {
        $title_admin = 'Daftar Pelanggan';
        $data_pelanggan = User::orderby('created_at','DESC')->where('role_id','user')->get();

        return view('admins.data_laporan.pelanggan', compact('title_admin','data_pelanggan'));
    }

    public function laporan_pembelian() {
        $title_admin = 'Laporan Pembelian';
        $data_pembelian = DataPembelian::orderby('created_at','DESC')->get();

        return view('admins.data_laporan.pembelian', compact('title_admin','data_pembelian'));
    }

    public function laporan_persediaan() {
        $title_admin = 'Laporan Persediaan';
        $data_barang = DataBarang::orderby('kategori_id','ASC')->get();

        return view('admins.data_laporan.persediaan', compact('title_admin','data_barang'));
    }
}
