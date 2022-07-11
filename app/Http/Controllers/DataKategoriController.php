<?php

namespace App\Http\Controllers;

use App\Models\DataKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataKategoriController extends Controller
{
    public function data_kategori() {
        $title_admin = 'Data Kategori';
        $data_kategori = DataKategori::orderby('nama_kategori','ASC')->get();

        return view('admins.data_kategori.index', compact('title_admin','data_kategori'));
    }

    public function tambah_data_kategori(Request $request) {

        $validatedData = $request->validate([
            'nama_kategori'  => 'required|max:100'
        ]);

        DataKategori::create($validatedData);

        Alert::success('Berhasil', 'Data Kategori berhasil ditambahkan!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_kategori');

    }

    public function ubah_data_kategori($id) {
        $title_admin = 'Edit Data Kategori';
        $data_kategori = DataKategori::find($id);

        return view('admins.data_kategori.ubah_data', compact('title_admin','data_kategori'));
    }

    public function simpan_data_kategori(Request $request, $id) {
        $data_kategori = DataKategori::find($id);

        $data_kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        Alert::success('Berhasil', 'Data Kategori telah berhasil diperbarui!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_kategori');
    }

    public function hapus_data_kategori($id) {
        $data_kategori = DataKategori::findorfail($id);
        $data_kategori->delete();

        Alert::success('Berhasil', 'Data Kategori berhasil dihapus!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_kategori');
    }
}
