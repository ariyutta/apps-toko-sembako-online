<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKategori;
use App\Models\DataPemasok;
use App\Models\DataPesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $title_user     = 'Rekomendasi';
        $title_admin    = 'Dashboard';

        $jml_pengguna   = User::all()->count();
        $jml_pemasok    = DataPemasok::all()->count();
        $jml_kategori   = DataKategori::all()->count();
        $jml_barang     = DataBarang::all()->count();
        $jml_pesanan    = DataPesanan::all()->count();

        $data = DataBarang::orderby('created_at','DESC')->paginate(12);  

        if(Auth::user()->hasRole('user')) {

            return view('users.index', compact('title_user','data'));
        }
        else if(Auth::user()->hasRole('administrator')) {

            return view('admins.index', compact('title_admin','jml_pemasok','jml_kategori','jml_pengguna','jml_barang','jml_pesanan'));
        }
        else if(Auth::user()->hasRole('developer')) {

            return view('admins.index', compact('title_admin','jml_pemasok','jml_kategori','jml_pengguna','jml_barang','jml_pesanan'));
        }
    }
}