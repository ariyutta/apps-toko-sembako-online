<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPembelian;
use App\Models\DataPesananDetail;
use App\Models\ReturPenjualan;
use App\Models\User;
use Illuminate\Http\Request;

class DataCetakController extends Controller
{
    public function cetak_daftar_pelanggan() {
        $title = 'Cetak Daftar Pelanggan';
        $data_pelanggan = User::orderby('created_at','DESC')->where('role_id','user')->get();

        return view('admins.data_cetak.daftar_pelanggan', compact('title','data_pelanggan'));
    }

    public function cetak_laporan_pembelian() {
        $title = 'Cetak Laporan Pembelian';
        $data_pembelian = DataPembelian::orderby('created_at','DESC')->get();

        return view('admins.data_cetak.laporan_pembelian', compact('title','data_pembelian'));
    }

    public function cetak_laporan_penjualan() {
        $title = 'Cetak Laporan Penjualan';
        $data_detail = DataPesananDetail::orderby('created_at','DESC')->get();

        return view('admins.data_cetak.laporan_penjualan', compact('title','data_detail'));
    }

    public function cetak_laporan_persediaan() {
        $title = 'Cetak Laporan Persediaan';
        $data_barang = DataBarang::orderby('kategori_id','ASC')->get();

        return view('admins.data_cetak.laporan_persediaan', compact('title','data_barang'));
    }

    public function cetak_retur_penjualan() {
        $title = 'Cetak Retur Penjualan';
        $data_retur = ReturPenjualan::orderby('created_at','DESC')->get();

        return view('admins.data_cetak.retur_penjualan', compact('title','data_retur'));
    }
}
