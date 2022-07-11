<?php

namespace App\Http\Controllers;

use App\Models\DataPemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class DataPemasokController extends Controller
{
    public function data_pemasok() {
        $title_admin = 'Data Pemasok';
        $data_pemasok = DataPemasok::orderby('created_at','DESC')->get();

        return view('admins.data_pemasok.index', compact('title_admin','data_pemasok'));
    }

    public function tambah_data_pemasok(Request $request) {

        $validatedData = $request->validate([
            'nama_pemasok'  => 'required|max:100',
            'alamat'        => 'required|max:100',
            'no_telp'       => 'required|max:17'
        ]);

        DataPemasok::create($validatedData);

        Alert::success('Berhasil', 'Data Pemasok berhasil ditambahkan!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_pemasok');

    }

    public function ubah_data_pemasok($id) {
        $title_admin = 'Edit Data Pemasok';
        $data_pemasok = DataPemasok::find($id);

        return view('admins.data_pemasok.ubah_data', compact('title_admin','data_pemasok'));
    }

    public function simpan_data_pemasok(Request $request, $id) {
        $data_pemasok = DataPemasok::find($id);

        $data_pemasok->update([
            'nama_barang' => $request->nama_barang,
            'nama_pemasok' => $request->nama_pemasok,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        Alert::success('Berhasil', 'Data Pemasok telah berhasil diperbarui!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_pemasok');
    }

    public function hapus_data_pemasok($id) {
        $data_pemasok = DataPemasok::findorfail($id);
        $data_pemasok->delete();

        Alert::success('Berhasil', 'Data Pemasok berhasil dihapus!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_pemasok');
    }
}
