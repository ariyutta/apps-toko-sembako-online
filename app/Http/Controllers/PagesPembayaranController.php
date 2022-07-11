<?php

namespace App\Http\Controllers;

use App\Models\DataKeranjang;
use App\Models\DataPayment;
use App\Models\DataPesanan;
use App\Models\DataPesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PagesPembayaranController extends Controller
{
    public function pembayaran_pesanan($id) { 
        $title_user = 'Pembayaran Pesanan';
        $data_pesanan = DataPesanan::find($id);
        $data_payment = DataPayment::all();
        $total_pesanan = DataPesananDetail::where('pesanan_id', $data_pesanan->id)->sum('total_harga_barang');
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        if($data_pesanan->status_pembayaran == 1) {
            
            Alert::warning('Kesalahan', 'Anda telah melakukan transaksi pembayaran!');
            return redirect('home/status_pesanan/detail/'.$data_pesanan->id);
        }

        return view('users.pembayaran_pesanan', compact('title_user','data_pesanan','total_pesanan','notif_cart','data_payment'));
    }

    public function submit_pembayaran(Request $request, $id) {
        $bukti_bayar = DataPesanan::find($id);
        $req = $request->all();
        $filename  = public_path('bukti_pembayaran/').$bukti_bayar->bukti_pembayaran;

        if(isset($req['bukti_pembayaran'])) {

            if(File::exists($filename)) {

                $bukti_pembayaran = $request->file('bukti_pembayaran');
                $filename_new = time() . '.' . $bukti_pembayaran->getClientOriginalExtension();
        
                //update filename to database
                $bukti_bayar->bukti_pembayaran = $filename_new;
                $bukti_bayar->save();   

                //Found existing file then delete
                File::delete($filename);
            }

            // Validasi Jenis Foto
            $this->validate($request,[
                'bukti_pembayaran' =>  'required|max:5000'
            ]);

            if (isset($req['id'])) {
                $bukti = DataPesanan::where('id', $bukti_bayar->id)->first();
                $files = $bukti->bukti_pembayaran;
                $gambar = public_path('bukti_pembayaran/' . $files);
                if (file_exists($gambar)) {
                    unlink($gambar);
                }
            }

            // Membuat Folder Jika Kosong
            $save_path = public_path('bukti_pembayaran/');
            if (!file_exists($save_path)) {
                mkdir($save_path, 755, true);
            }

            // Mengambil Nama Gambar
            $file = $request->file('bukti_pembayaran');
            $nama_foto = time().'_'.$file->getClientOriginalName();

            // Tempat Menyimpan Gambar
            $url = public_path('bukti_pembayaran/' . $nama_foto);

            // Proses Menyimpan Gambar
            $save_foto = Image::make($request->file('bukti_pembayaran'))->resize(400, 700)->encode('png', 80)->save($url);
            
            //ambil nama gambar nya
            $req['bukti_pembayaran'] = $nama_foto;
        } 
        else {
            //echo "gak ada file upload";
            if (!empty($req->bukti_pembayaran)) {
                $req['bukti_pembayaran'] = $req->bukti_pembayaran;
            } else {
                $req['bukti_pembayaran'] = $bukti_bayar->bukti_pembayaran;
            }
            // $req['gambar_barang'] = '-';
            }

        DB::beginTransaction();
        try {
            $bukti_bayar->bukti_pembayaran = $nama_foto;
            $bukti_bayar->jenis_pembayaran_id = $request->jenis_pembayaran_id;
            $bukti_bayar->update();
           
            Alert::success('Berhasil', 'Bukti pembayaran berhasil terkirim!');
            DB::commit();
        } catch (\Exception $ex) {
            Alert::error('Gagal', 'Terjadi Kesalahan!');
            DB::rollback();
            throw $ex;
        }
        return redirect('home/status_pesanan');
    }
}
