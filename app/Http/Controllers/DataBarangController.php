<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class DataBarangController extends Controller
{
    public function data_barang() {
        $title_admin = 'Data Barang';
        $data_barang = DataBarang::all();
        $kategori = DataKategori::all();

        return view('admins.data_barang.index', compact('title_admin','data_barang','kategori'));
    }

    public function tambah_data_barang(Request $request) {
        // if($request->file('gambar_barang')) {
        //     $file = $request->file('gambar_barang');

        //     $nama_file = time().'_'.$file->getClientOriginalName();
        //     $file->move('gambar_barang', $nama_file);
        //     $model->gambar_barang = $nama_file;
        // }
        // $model->save();

        $req = $request->all();

        if(isset($req['gambar_barang'])) {

            // Validasi Jenis Foto
            $this->validate($request,[
                'gambar_barang' =>  'required|max:5000'
            ]);

            // Membuat Folder Jika Kosong
            $save_path = public_path('gambar_barang/');
            if (!file_exists($save_path)) {
                mkdir($save_path, 755, true);
            }

            // Mengambil Nama Gambar
            $file = $request->file('gambar_barang');
            $nama_foto = time().'_'.$file->getClientOriginalName();

            // Tempat Menyimpan Gambar
            $url = public_path('gambar_barang/' . $nama_foto);

            // Proses Menyimpan Gambar
            $save_foto = Image::make($request->file('gambar_barang'))->resize(500, 500)->encode('png', 80)->save($url);

            //ambil nama gambar nya
            $req['gambar_barang'] = $nama_foto;
        } 

        DB::beginTransaction();
        try {
            $model = new DataBarang;
            $model->kode_barang = $request->kode_barang;
            $model->nama_barang = $request->nama_barang;
            $model->kategori_id = $request->kategori_id;
            $model->stok = $request->stok;
            $model->harga_beli = $request->harga_beli;
            $model->harga_jual = $request->harga_jual;
            $model->keterangan = $request->keterangan;

            $model->gambar_barang = $req['gambar_barang'];
            // dd($model);
            $model->save();

            Alert::success('Berhasil', 'Data Barang berhasil ditambahkan!');
            DB::commit();
        } catch (\Exception $ex) {
            Alert::error('Gagal', 'Terjadi Kesalahan!');
            DB::rollback();
            throw $ex;
        }
        return redirect()->back();
    }

    public function ubah_data_barang($id) {
        $title_admin = 'Edit Data Barang';
        $data_barang = DataBarang::find($id);
        $kategori = DataKategori::all();

        return view('admins.data_barang.ubah_data', compact('title_admin','data_barang','kategori'));
    }

    public function simpan_data_barang(Request $request, $id) {
        $data_barang = DataBarang::find($id);
        $req = $request->all();

        if(isset($req['gambar_barang'])) {

            // Validasi Jenis Foto
            $this->validate($request,[
                'gambar_barang' =>  'required|max:5000'
            ]);

            if (isset($req['id'])) {
                $barang = DataBarang::where('id', $data_barang->id)->first();
                $files = $barang->gambar_barang;
                $gambar = public_path('gambar_barang/' . $files);
                if (file_exists($gambar)) {
                    unlink($gambar);
                }
            }

            // Membuat Folder Jika Kosong
            $save_path = public_path('gambar_barang/');
            if (!file_exists($save_path)) {
                mkdir($save_path, 755, true);
            }

            // Mengambil Nama Gambar
            $file = $request->file('gambar_barang');
            $nama_foto = time().'_'.$file->getClientOriginalName();

            // Tempat Menyimpan Gambar
            $url = public_path('gambar_barang/' . $nama_foto);
            
            // Proses Menyimpan Gambar
            $save_foto = Image::make($request->file('gambar_barang'))->resize(500, 500)->encode('png', 80)->save($url);
            
            //ambil nama gambar nya
            $req['gambar_barang'] = $nama_foto;
        } 
        else {
            //echo "gak ada file upload";
            if (!empty($req->gambar_barang)) {
                $req['gambar_barang'] = $req->gambar_barang;
            } else {
                $req['gambar_barang'] = $data_barang->gambar_barang;
            }
            // $req['gambar_barang'] = '-';
            }

        DB::beginTransaction();
        try {
            $model = DataBarang::find($id);
            $model->nama_barang = $request->nama_barang;
            $model->kategori_id = $request->kategori_id;
            $model->stok = $request->stok;
            $model->harga_beli = $request->harga_beli;
            $model->harga_jual = $request->harga_jual;
            $model->keterangan = $request->keterangan;

            $model->gambar_barang = $req['gambar_barang'];
            $model->save();

            Alert::success('Berhasil', 'Data Barang berhasil diperbarui!');
            DB::commit();
        } catch (\Exception $ex) {
            Alert::error('Gagal', 'Terjadi Kesalahan!');
            DB::rollback();
            throw $ex;
        }
        return redirect('dashboard/admins/data_barang');
    }

    public function hapus_data_barang($id) {
        $data_barang = DataBarang::findorfail($id);
        $data_barang->delete();

        Alert::success('Berhasil', 'Data Barang berhasil dihapus!');
        return redirect('dashboard/admins/data_barang');
    }
}
