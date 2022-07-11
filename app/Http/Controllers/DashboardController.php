<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKategori;
use App\Models\DataKeranjang;
use App\Models\DataPemasok;
use App\Models\DataPesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $title_user     = 'Home';
        $title_admin    = 'Dashboard';
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $jml_pembayaran_masuk = DataPesanan::where('status_pembayaran', 1)->sum('jumlah_total');
        $jml_pelanggan  = User::where('role_id','user')->count();
        $jml_pemasok    = DataPemasok::all()->count();
        $jml_kategori   = DataKategori::all()->count();
        $jml_barang     = DataBarang::all()->count();
        $jml_pesanan    = DataPesanan::all()->count();

        $data = DataBarang::orderby('terjual','DESC')->paginate(12);  

        if(Auth::user()->hasRole('user')) {

            return view('users.index', compact('title_user','data','notif_cart'));
        }
        else if(Auth::user()->hasRole('administrator')) {

            return view('admins.index', compact('title_admin','jml_pemasok','jml_kategori','jml_pelanggan','jml_barang','jml_pesanan','jml_pembayaran_masuk'));
        }
        else if(Auth::user()->hasRole('developer')) {

            return view('admins.index', compact('title_admin','jml_pemasok','jml_kategori','jml_pelanggan','jml_barang','jml_pesanan','jml_pembayaran_masuk'));
        }
    }
}