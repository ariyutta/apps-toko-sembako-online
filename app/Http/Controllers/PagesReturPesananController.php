<?php

namespace App\Http\Controllers;

use App\Models\DataKeranjang;
use App\Models\DataPesanan;
use App\Models\ReturPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class PagesReturPesananController extends Controller
{
    public function retur_pesanan($id) {
        $title_user = 'Retur Pesanan';
        $user_login = Auth::user()->id;
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        $data_pesanan = DataPesanan::find($id);

        return view('users.pages_retur_pesanan.index', compact('title_user','user_login','notif_cart','data_pesanan'));
    }
    
    public function tambah_retur(Request $request) {

        $req = $request->all();

        if(isset($req['bukti_barang'])) {

            // Validasi Jenis Foto
            $this->validate($request,[
                'bukti_barang' =>  'required|max:5000'
            ]);

            // Membuat Folder Jika Kosong
            $save_path = public_path('bukti_barang/');
            if (!file_exists($save_path)) {
                mkdir($save_path, 755, true);
            }

            // Mengambil Nama Gambar
            $file = $request->file('bukti_barang');
            $nama_foto = time().'_'.$file->getClientOriginalName();

            // Tempat Menyimpan Gambar
            $url = public_path('bukti_barang/' . $nama_foto);

            // Proses Menyimpan Gambar
            $save_foto = Image::make($request->file('bukti_barang'))->resize(500, 500)->encode('png', 80)->save($url);

            //ambil nama gambar nya
            $req['bukti_barang'] = $nama_foto;
        } 

        DB::beginTransaction();
        try {
            $model = new ReturPenjualan();
            $model->pesanan_id = $request->pesanan_id_hide;
            $model->user_id = $request->user_id_hide;
            $model->status_aktif = 1;
            $model->total_harga_pesanan = $request->jumlah_total_hide;
            $model->kondisi = $request->kondisi;

            $model->bukti_barang = $req['bukti_barang'];
            $model->save();

            Alert::success('Berhasil', 'Retur Pesanan berhasil terkirim!');
            DB::commit();
        } catch (\Exception $ex) {
            Alert::error('Gagal', 'Terjadi Kesalahan!');
            DB::rollback();
            throw $ex;
        }
        return redirect('home/status_pesanan');
    }
}
