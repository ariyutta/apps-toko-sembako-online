<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPemasok;
use App\Models\DataPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataPembelianController extends Controller
{
    public function data_pembelian() {
        $title_admin = 'Data Pembelian';
        $data_pembelian = DataPembelian::orderby('created_at','DESC')->get();
        $data_barang = DataBarang::all();
        $data_pemasok = DataPemasok::all();

        return view('admins.data_pembelian.index', compact('title_admin','data_pembelian','data_barang','data_pemasok'));
    }

    public function tambah_data_pembelian(Request $request) {

        $validatedData = $request->validate([
            'barang_id'             => 'required',
            'pemasok_id'            => 'required',
            'jumlah_pembelian'      => 'required',
        ]);

        DataPembelian::create([
            'barang_id' =>  $request->barang_id,
            'pemasok_id' => $request->pemasok_id,
            'jumlah_pembelian' => $request->jumlah_pembelian,
        ]);
        
        $barang = DataBarang::where('id', $request->barang_id)->first();
        $barang->stok = $barang->stok + $request->jumlah_pembelian;
        $barang->pemasok_id = $request->pemasok_id;
        $barang->save();

        Alert::success('Berhasil', 'Data Pembelian berhasil ditambahkan!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_pembelian');

    }

    public function ubah_data_pembelian($id) {
        $title_admin = 'Edit Data Pembelian';
        $data_pembelian = DataPembelian::find($id);

        return view('admins.data_pembelian.ubah_data', compact('title_admin','data_pembelian'));
    }

    public function simpan_data_pembelian(Request $request, $id) {
        $data_pembelian = DataPembelian::find($id);

        $data_pembelian->update([
            'nama_barang' => $request->nama_barang,
            'nama_pembelian' => $request->nama_pembelian,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        Alert::success('Berhasil', 'Data Pembelian telah berhasil diperbarui!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_pembelian');
    }

    public function hapus_data_pembelian($id) {
        $data_pembelian = DataPembelian::findorfail($id);
        $data_pembelian->delete();

        Alert::success('Berhasil', 'Data Pembelian berhasil dihapus!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_pembelian');
    }
}
