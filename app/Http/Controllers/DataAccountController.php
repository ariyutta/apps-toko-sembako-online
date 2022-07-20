<?php

namespace App\Http\Controllers;

use App\Models\DataAgama;
use App\Models\DataKeranjang;
use App\Models\DataPekerjaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class DataAccountController extends Controller
{
    public function accounts() {
        $title_admin = 'My Account';
        $user = auth()->user()->id;
        $data = User::where('id', $user)->first();

        return view('admins.data_auth.accounts', compact('title_admin','data'));
    }

    public function edit_accounts() {
        $title_admin = 'Edit Accounts';
        $user = auth()->user()->id;
        $data = User::where('id', $user)->first();

        // $agama = DataAgama::all();
        // $select_agama = DataAgama::find($data->agama_id);
        // $pekerjaan = DataPekerjaan::all();
        // $select_pekerjaan = DataPekerjaan::find($data->pekerjaan_id);

        return view('admins.data_auth.edit_accounts', compact('title_admin','data'));
    }

    public function simpan_accounts(Request $request, $id) {
        $get_accounts = User::find($id);
        $req = $request->all();
        $filename  = public_path('gambar_profil/').$get_accounts->gambar_profil;

        // if($request->agama_id == '*') {
        //     Alert::warning('Perhatian', 'Form tidak boleh kosong!');
        //     return redirect()->back();
        // }
        // else if($request->pekerjaan_id == '*') {
        //     Alert::warning('Perhatian', 'Form tidak boleh kosong!');
        //     return redirect()->back();
        // }
        // else if($request->jenis_kelamin == '*') {
        //     Alert::warning('Perhatian', 'Form tidak boleh kosong!');
        //     return redirect()->back();
        // }

        if(isset($req['gambar_profil'])) {

            if(File::exists($filename)) {

                $gambar_profil = $request->file('gambar_profil');
                $filename_new = time() . '.' . $gambar_profil->getClientOriginalExtension();
        
                //update filename to database
                $get_accounts->gambar_profil = $filename_new;
                $get_accounts->save();   

                //Found existing file then delete
                File::delete($filename);
            }

            // Validasi Jenis Foto
            $this->validate($request,[
                'gambar_profil' =>  'required|max:5000'
            ]);

            if (isset($req['id'])) {
                $pengguna = User::where('id', $get_accounts->id)->first();
                $files = $pengguna->gambar_profil;
                $gambar = public_path('gambar_profil/' . $files);
                if (file_exists($gambar)) {
                    unlink($gambar);
                }
            }

            // Membuat Folder Jika Kosong
            $save_path = public_path('gambar_profil/');
            if (!file_exists($save_path)) {
                mkdir($save_path, 755, true);
            }

            // Mengambil Nama Gambar
            $file = $request->file('gambar_profil');
            $nama_foto = time().'_'.$file->getClientOriginalName();

            // Tempat Menyimpan Gambar
            $url = public_path('gambar_profil/' . $nama_foto);

            // Proses Menyimpan Gambar
            $save_foto = Image::make($request->file('gambar_profil'))->resize(400, 400)->encode('png', 80)->save($url);
            
            //ambil nama gambar nya
            $req['gambar_profil'] = $nama_foto;
        } 
        else {
            //echo "gak ada file upload";
            if (!empty($req->gambar_profil)) {
                $req['gambar_profil'] = $req->gambar_profil;
            } else {
                $req['gambar_profil'] = $get_accounts->gambar_profil;
            }
            // $req['gambar_barang'] = '-';
            }

        DB::beginTransaction();
        try {
            if($get_accounts->pelanggan_id == Null) {
                if($request->gambar_profil == Null) {
                    $get_accounts->pelanggan_id = mt_rand(100000000, 999999999);
                    $get_accounts->name = $request->name;
                    // $get_accounts->tempat_lahir = $request->tempat_lahir;
                    // $get_accounts->tgl_lahir = $request->tgl_lahir;
                    // $get_accounts->jenis_kelamin = $request->jenis_kelamin;
                    // $get_accounts->agama_id = $request->agama_id;
                    // $get_accounts->pekerjaan_id = $request->pekerjaan_id;
                    $get_accounts->no_telp = $request->no_telp;
                    $get_accounts->alamat = $request->alamat;
                    $get_accounts->status_verifikasi = 1;
                    $get_accounts->update();
                }
                else {
                    $get_accounts->name = $request->name;
                    // $get_accounts->tempat_lahir = $request->tempat_lahir;
                    // $get_accounts->tgl_lahir = $request->tgl_lahir;
                    // $get_accounts->jenis_kelamin = $request->jenis_kelamin;
                    // $get_accounts->agama_id = $request->agama_id;
                    // $get_accounts->pekerjaan_id = $request->pekerjaan_id;
                    $get_accounts->no_telp = $request->no_telp;
                    $get_accounts->alamat = $request->alamat;
                    $get_accounts->gambar_profil = $nama_foto;
                    $get_accounts->status_verifikasi = 1;
                    $get_accounts->update();
                }
           }
           else {
                if($request->gambar_profil == Null) {
                    $get_accounts->name = $request->name;
                    // $get_accounts->tempat_lahir = $request->tempat_lahir;
                    // $get_accounts->tgl_lahir = $request->tgl_lahir;
                    // $get_accounts->jenis_kelamin = $request->jenis_kelamin;
                    // $get_accounts->agama_id = $request->agama_id;
                    // $get_accounts->pekerjaan_id = $request->pekerjaan_id;
                    $get_accounts->no_telp = $request->no_telp;
                    $get_accounts->alamat = $request->alamat;
                    $get_accounts->status_verifikasi = 1;
                    $get_accounts->update();
                }
                else {
                    $get_accounts->name = $request->name;
                    // $get_accounts->tempat_lahir = $request->tempat_lahir;
                    // $get_accounts->tgl_lahir = $request->tgl_lahir;
                    // $get_accounts->jenis_kelamin = $request->jenis_kelamin;
                    // $get_accounts->agama_id = $request->agama_id;
                    // $get_accounts->pekerjaan_id = $request->pekerjaan_id;
                    $get_accounts->no_telp = $request->no_telp;
                    $get_accounts->alamat = $request->alamat;
                    $get_accounts->gambar_profil = $nama_foto;
                    $get_accounts->status_verifikasi = 1;
                    $get_accounts->update();
                }
           }
            Alert::success('Berhasil', 'Data Akun telah berhasil diperbarui!');
            DB::commit();
        } catch (\Exception $ex) {
            Alert::error('Gagal', 'Terjadi Kesalahan!');
            DB::rollback();
            throw $ex;
        }
        return redirect(''.Auth::user()->role_user->role->name.'/accounts');
    }
}
