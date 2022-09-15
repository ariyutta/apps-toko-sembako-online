<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPembelian;
use App\Models\DataPesananDetail;
use App\Models\ReturPenjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

class DataLaporanController extends Controller
{
    public function laporan() {
        $title_admin = 'Laporan';

        return view('admins.data_laporan.index', compact('title_admin'));
    }

    public function laporan_penjualan() {
        $title_admin = 'Laporan Penjualan';

        return view('admins.data_laporan.penjualan', compact('title_admin'));
    }

    public function laporan_penjualan_show(Request $request) {
        
        if(!empty($request->from_date)) {
            if($request->from_date === $request->to_date) {
                $data_penjualan = DataPesananDetail::whereDate('created_at','=', $request->from_date);
            }
            else {
                $data_penjualan = DataPesananDetail::whereBetween('created_at', array($request->from_date, $request->to_date));
            }                
        }
        else {
            $data_penjualan = DataPesananDetail::select('*')->orderby('created_at','DESC');
        }
        
        return DataTables::of($data_penjualan)

        ->addColumn('kode_barang', function($data_penjualan){
            if($data_penjualan->barang == Null) {
                return '';
            }
            else {
                return $data_penjualan->barang->kode_barang;
            }
        })
        ->addColumn('nama_barang', function($data_penjualan){
            if($data_penjualan->barang == Null) {
                return '';
            }
            else {
                return $data_penjualan->barang->nama_barang;
            }
        })
        ->addColumn('nama_pelanggan', function($data_penjualan){
            if($data_penjualan->pesanan->user == Null) {
                return '';
            }
            else {
                return $data_penjualan->pesanan->user->name;
            }
        })
        ->addColumn('jumlah_item', function($data_penjualan){
            if($data_penjualan == Null) {
                return '';
            }
            else {
                return $data_penjualan->jumlah_item;
            }
        })
        ->addColumn('jumlah_harga', function($data_penjualan){
            if($data_penjualan == Null) {
                return '';
            }
            else {
                return 'Rp. '.number_format($data_penjualan->total_harga_barang , 0, ",", ".");
            }
        })
        ->addColumn('tanggal', function($data_penjualan){
            if($data_penjualan != Null) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data_penjualan->created_at);
            }         
        })
        ->escapeColumns([])
        ->addIndexColumn()
        ->make(true);
    }

    public function daftar_pelanggan(Request $request) {
        $title_admin = 'Daftar Pelanggan';

        return view('admins.data_laporan.pelanggan', compact('title_admin'));
    }

    public function daftar_pelanggan_show(Request $request) {
        
        if(!empty($request->from_date)) {
            if($request->from_date === $request->to_date) {
                $data_pelanggan = User::whereDate('created_at','=', $request->from_date)->where('role_id','user');
            }
            else {
                $data_pelanggan = User::whereBetween('created_at', array($request->from_date, $request->to_date))->where('role_id','user');
            }                
        }
        else {
            $data_pelanggan = User::select('*')->orderby('created_at','DESC')->where('role_id','user');
        }
        
        return DataTables::of($data_pelanggan)

        ->addColumn('pelanggan_id', function($data_pelanggan){
            if($data_pelanggan->pelanggan_id == Null) {
                return '<span style="color: orange">Belum Verifikasi</span>';
            }
            else {
                return $data_pelanggan->pelanggan_id;
            }
        })
        ->addColumn('nama', function($data_pelanggan){
            if($data_pelanggan != Null) {
                return $data_pelanggan->name;
            }
        })
        ->addColumn('no_telp', function($data_pelanggan){
            if($data_pelanggan->no_telp == Null) {
                return '<span style="color: orange">Belum Diisi</span>';
            }
            else {
                return $data_pelanggan->no_telp;
            }
        })
        ->addColumn('alamat', function($data_pelanggan){
            if($data_pelanggan->alamat == Null) {
                return '<span style="color: orange">Belum Diisi</span>';
            }
            else {
                return $data_pelanggan->alamat;
            }
        })
        ->addColumn('tanggal', function($data_pelanggan){
            if($data_pelanggan != Null) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data_pelanggan->created_at);
            }         
        })
        ->escapeColumns([])
        ->addIndexColumn()
        ->make(true);
    }

    public function laporan_pembelian() {
        $title_admin = 'Laporan Pembelian';

        return view('admins.data_laporan.pembelian', compact('title_admin'));
    }

    public function laporan_pembelian_show(Request $request) {
        
        if(!empty($request->from_date)) {
            if($request->from_date === $request->to_date) {
                $data_pembelian = DataPembelian::whereDate('created_at','=', $request->from_date);
            }
            else {
                $data_pembelian = DataPembelian::whereBetween('created_at', array($request->from_date, $request->to_date));
            }                
        }
        else {
            $data_pembelian = DataPembelian::select('*')->orderby('created_at','DESC');
        }
        
        return DataTables::of($data_pembelian)

        ->addColumn('kode_barang', function($data_pembelian){
            if($data_pembelian->barang == Null) {
                return '';
            }
            else {
                return $data_pembelian->barang->kode_barang;
            }
        })
        ->addColumn('nama_barang', function($data_pembelian){
            if($data_pembelian->barang == Null) {
                return '';
            }
            else {
                return $data_pembelian->barang->nama_barang;
            }
        })
        ->addColumn('nama_pemasok', function($data_pembelian){
            if($data_pembelian->pemasok == Null) {
                return '';
            }
            else {
                return $data_pembelian->pemasok->nama_pemasok;
            }
        })
        ->addColumn('jumlah_pembelian', function($data_pembelian){
            if($data_pembelian == Null) {
                return '';
            }
            else {
                return $data_pembelian->jumlah_pembelian;
            }
        })
        ->addColumn('tanggal', function($data_pembelian){
            if($data_pembelian != Null) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data_pembelian->created_at);
            }         
        })
        ->escapeColumns([])
        ->addIndexColumn()
        ->make(true);
    }

    public function laporan_persediaan() {
        $title_admin = 'Laporan Persediaan';

        return view('admins.data_laporan.persediaan', compact('title_admin'));
    }

    public function laporan_persediaan_show(Request $request) {
        
        if(!empty($request->from_date)) {
            if($request->from_date === $request->to_date) {
                $data_persediaan = DataBarang::whereDate('created_at','=', $request->from_date);
            }
            else {
                $data_persediaan = DataBarang::whereBetween('created_at', array($request->from_date, $request->to_date));
            }                
        }
        else {
            $data_persediaan = DataBarang::select('*')->orderby('created_at','DESC');
        }
        
        return DataTables::of($data_persediaan)

        ->addColumn('kode_barang', function($data_persediaan){
            if($data_persediaan == Null) {
                return '';
            }
            else {
                return $data_persediaan->kode_barang;
            }
        })
        ->addColumn('nama_barang', function($data_persediaan){
            if($data_persediaan == Null) {
                return '';
            }
            else {
                return $data_persediaan->nama_barang;
            }
        })
        ->addColumn('stok', function($data_persediaan){
            if($data_persediaan == Null) {
                return '';
            }
            else {
                return $data_persediaan->stok;
            }
        })
        ->addColumn('detail_barang', function($data_persediaan){
            if($data_persediaan == Null) {
                return '';
            }
            else {
                return $data_persediaan->keterangan;
            }
        })
        ->addColumn('nama_pemasok', function($data_persediaan){
            if($data_persediaan->pemasok == Null) {
                return '';
            }
            else {
                return $data_persediaan->pemasok->nama_pemasok;
            }
        })
        ->addColumn('kategori', function($data_persediaan){
            if($data_persediaan == Null) {
                return '';
            }
            else {
                return $data_persediaan->kategori->nama_kategori;
            }
        })
        ->addColumn('tanggal', function($data_persediaan){
            if($data_persediaan != Null) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data_persediaan->created_at);
            }         
        })
        ->escapeColumns([])
        ->addIndexColumn()
        ->make(true);
    }

    public function laporan_retur_penjualan() {
        $title_admin = 'Laporan Retur Penjualan';
        $retur_penjualan = ReturPenjualan::where('status_aktif', 2)->orderby('created_at','DESC')->get();

        return view('admins.data_laporan.retur_penjualan', compact('title_admin','retur_penjualan'));
    }

    public function laporan_retur_penjualan_show(Request $request) {
        
        if(!empty($request->from_date)) {
            if($request->from_date === $request->to_date) {
                $data_retur_penjualan = ReturPenjualan::where('status_aktif', 2)->whereDate('created_at','=', $request->from_date);
            }
            else {
                $data_retur_penjualan = ReturPenjualan::where('status_aktif', 2)->whereBetween('created_at', array($request->from_date, $request->to_date));
            }                
        }
        else {
            $data_retur_penjualan = ReturPenjualan::where('status_aktif', 2)->orderby('created_at','DESC');
        }
        
        return DataTables::of($data_retur_penjualan)

        ->addColumn('nama_pelanggan', function($data_retur_penjualan){
            if($data_retur_penjualan == Null) {
                return '';
            }
            else {
                return $data_retur_penjualan->user->name;
            }
        })
        ->addColumn('kode_pesanan', function($data_retur_penjualan){
            if($data_retur_penjualan == Null) {
                return '';
            }
            else {
                return $data_retur_penjualan->pesanan->kode_pesanan;
            }
        })
        ->addColumn('total_pembayaran', function($data_retur_penjualan){
            if($data_retur_penjualan == Null) {
                return '';
            }
            else {
                return 'Rp. '.number_format($data_retur_penjualan->pesanan->jumlah_total , 0, ",", ".");
            }
        })
        ->addColumn('kondisi', function($data_retur_penjualan){
            if($data_retur_penjualan == Null) {
                return '';
            }
            else if($data_retur_penjualan->kondisi == 'rusak'){
                return 'Rusak';
            }
            else if($data_retur_penjualan->kondisi == 'lecet'){
                return 'Lecet';
            }
            else if($data_retur_penjualan->kondisi == 'robek'){
                return 'Robek';
            }
            else if($data_retur_penjualan->kondisi == 'pecah'){
                return 'Pecah';
            }
            else if($data_retur_penjualan->kondisi == 'lainnya'){
                return 'Lainnya';
            }
        })
        ->addColumn('tanggal', function($data_retur_penjualan){
            if($data_retur_penjualan != Null) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data_retur_penjualan->created_at);
            }         
        })
        ->escapeColumns([])
        ->addIndexColumn()
        ->make(true);
    }
}
