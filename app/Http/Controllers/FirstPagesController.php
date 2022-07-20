<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKeranjang;
use App\Models\DataPesanan;
use App\Models\DataUlasan;
use App\Models\DataWilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class FirstPagesController extends Controller
{
    public function index() {
        $title_user = 'Rekomendasi';
        $data = DataBarang::orderby('terjual','DESC')->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.index', compact('title_user','data','notif_cart'));
    }

    public function detail_index(Request $request, $id) {
        $title_user = 'Detail Rekomendasi';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function bahan_pokok() {
        $title_user = 'Bahan Pokok & Bumbu Dapur';
        $data = DataBarang::where('kategori_id', 1)->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_bahan_pokok.index', compact('title_user','data','notif_cart'));
    }

    public function detail_bahan_pokok($id) {
        $title_user = 'Detail Bahan Pokok & Bumbu Dapur';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.pages_bahan_pokok.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function makanan_instan() {
        $title_user = 'Makanan Instan';
        $data = DataBarang::where('kategori_id', 2)->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_makanan_instan.index', compact('title_user','data','notif_cart'));
    }

    public function detail_makanan_instan($id) {
        $title_user = 'Detail Makanan Instan';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.pages_makanan_instan.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function makanan_ringan() {
        $title_user = 'Makanan Ringan';
        $data = DataBarang::where('kategori_id', 3)->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_makanan_ringan.index', compact('title_user','data','notif_cart'));
    }

    public function detail_makanan_ringan($id) {
        $title_user = 'Detail Makanan Ringan';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.pages_makanan_ringan.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function minuman() {
        $title_user = 'Minuman';
        $data = DataBarang::where('kategori_id', 4)->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_minuman.index', compact('title_user','data','notif_cart'));
    }

    public function detail_minuman($id) {
        $title_user = 'Detail Minuman';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.pages_minuman.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function kebersihan_rumah() {
        $title_user = 'Kebersihan Rumah';
        $data = DataBarang::where('kategori_id', 5)->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_kebersihan_rumah.index', compact('title_user','data','notif_cart'));
    }

    public function detail_kebersihan_rumah($id) {
        $title_user = 'Detail Kebersihan Rumah';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.pages_kebersihan_rumah.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function perawatan_tubuh() {
        $title_user = 'Perawatan Tubuh';
        $data = DataBarang::where('kategori_id', 6)->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_perawatan_tubuh.index', compact('title_user','data','notif_cart'));
    }

    public function detail_perawatan_tubuh($id) {
        $title_user = 'Detail Perawatan Tubuh';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.pages_perawatan_tubuh.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function perawatan_rambut() {
        $title_user = 'Perawatan Rambut';
        $data = DataBarang::where('kategori_id', 7)->paginate(12);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_perawatan_rambut.index', compact('title_user','data','notif_cart'));
    }

    public function detail_perawatan_rambut($id) {
        $title_user = 'Detail Perawatan Rambut';
        $data = DataBarang::find($id);
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_ulasan = DataUlasan::where('barang_id', $data->id)->paginate(10);

        return view('users.pages_perawatan_rambut.detail', compact('title_user','data','notif_cart','data_ulasan'));
    }

    public function tambah_ulasan(Request $request) {
        $data_ulasan = new DataUlasan();
        $data_ulasan->user_id = Auth::user()->id;
        $data_ulasan->barang_id = $request->barang_id;
        $data_ulasan->komentar = $request->komentar;
        $data_ulasan->rating = $request->rating;
        $data_ulasan->save();

        return redirect()->back();
    }

}