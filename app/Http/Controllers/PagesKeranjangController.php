<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKeranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesKeranjangController extends Controller
{
    public function keranjang() {
        $title_user = 'Keranjang';
        $user_login = Auth::user();

        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();
        
        $notif_cart_close = DataKeranjang::where('status_notif','!=', 0)->get();
            foreach($notif_cart_close as $cart_close) {
                $cart_close->status_notif = 0;
                $cart_close->update();
            }

        $data_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->get();

        $total_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->sum('jumlah_harga');

        return view('users.pages_keranjang.index', compact('title_user','data_keranjang','total_keranjang','notif_cart'));
    }

    public function tambah_keranjang(Request $request, $id){
        $user_login = Auth::user();
        $get_barang = DataBarang::find($id);

        // return $request->all();

        if($request->jumlah_barang > $get_barang->stok) {

            Alert::warning('Perhatian', 'Jumlah Pesanan melebihi stok!');
            return redirect()->back();
        }
        else if($request->jumlah_barang == Null) {

            Alert::warning('Perhatian', 'Jumlah Pesanan tidak boleh kosong!');
            return redirect()->back();
        }
        else if($request->jumlah_barang == 0) {

            Alert::warning('Perhatian', 'Masukkan Jumlah Pesanan!');
            return redirect()->back();
        }
        else if($request->jumlah_barang < 0) {

            Alert::warning('Gagal', 'Masukkan Jumlah Pesanan dengan benar!');
            return redirect()->back();
        }

        $model = new DataKeranjang;
        $model->user_id = $user_login->id;
        $model->barang_id = $get_barang->id;
        $model->nama_barang = $get_barang->nama_barang;
        $model->gambar_barang = $get_barang->gambar_barang;
        $model->jumlah_barang = $request->jumlah_barang;
        $model->status_keranjang = 1;
        $model->status_notif = 1;
        $model->jumlah_harga = $get_barang->harga_jual * $request->jumlah_barang;

        $model->save();

        Alert::toast('Barang berhasil dimasukkan ke Keranjang!', 'success');
        return redirect()->back();
    }

    public function hapus_keranjang($id) {
        $get_keranjang = DataKeranjang::findorfail($id);
        $get_keranjang->delete();

        Alert::success('Terhapus', 'Barang berhasil dihapus dari daftar Keranjang!');
        return redirect()->back();
    }
}
