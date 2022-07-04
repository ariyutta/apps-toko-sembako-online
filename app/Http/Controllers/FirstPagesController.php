<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataKeranjang;
use App\Models\DataPesanan;
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
        $data = DataBarang::orderby('created_at','DESC')->paginate(12);

        return view('users.index', compact('title_user','data'));
    }

    public function detail_index(Request $request, $id) {
        $title_user = 'Detail Rekomendasi';
        $data = DataBarang::find($id);

        return view('users.detail', compact('title_user','data'));
    }

    public function bahan_pokok() {
        $title_user = 'Bahan Pokok & Bumbu Dapur';
        $data = DataBarang::where('kategori_id', 1)->paginate(12);

        return view('users.pages_bahan_pokok.index', compact('title_user','data'));
    }

    public function detail_bahan_pokok($id) {
        $title_user = 'Detail Bahan Pokok & Bumbu Dapur';
        $data = DataBarang::find($id);

        return view('users.pages_bahan_pokok.detail', compact('title_user','data'));
    }

    public function makanan_instan() {
        $title_user = 'Makanan Instan';
        $data = DataBarang::where('kategori_id', 2)->paginate(12);

        return view('users.pages_makanan_instan.index', compact('title_user','data'));
    }

    public function detail_makanan_instan($id) {
        $title_user = 'Detail Makanan Instan';
        $data = DataBarang::find($id);

        return view('users.pages_makanan_instan.detail', compact('title_user','data'));
    }

    public function makanan_ringan() {
        $title_user = 'Makanan Ringan';
        $data = DataBarang::where('kategori_id', 3)->paginate(12);

        return view('users.pages_makanan_ringan.index', compact('title_user','data'));
    }

    public function detail_makanan_ringan($id) {
        $title_user = 'Detail Makanan Ringan';
        $data = DataBarang::find($id);

        return view('users.pages_makanan_ringan.detail', compact('title_user','data'));
    }

    public function minuman() {
        $title_user = 'Minuman';
        $data = DataBarang::where('kategori_id', 4)->paginate(12);

        return view('users.pages_minuman.index', compact('title_user','data'));
    }

    public function detail_minuman($id) {
        $title_user = 'Detail Minuman';
        $data = DataBarang::find($id);

        return view('users.pages_minuman.detail', compact('title_user','data'));
    }

    public function kebersihan_rumah() {
        $title_user = 'Kebersihan Rumah';
        $data = DataBarang::where('kategori_id', 5)->paginate(12);

        return view('users.pages_kebersihan_rumah.index', compact('title_user','data'));
    }

    public function detail_kebersihan_rumah($id) {
        $title_user = 'Detail Kebersihan Rumah';
        $data = DataBarang::find($id);

        return view('users.pages_kebersihan_rumah.detail', compact('title_user','data'));
    }

    public function perawatan_tubuh() {
        $title_user = 'Perawatan Tubuh';
        $data = DataBarang::where('kategori_id', 6)->paginate(12);

        return view('users.pages_perawatan_tubuh.index', compact('title_user','data'));
    }

    public function detail_perawatan_tubuh($id) {
        $title_user = 'Detail Perawatan Tubuh';
        $data = DataBarang::find($id);

        return view('users.pages_perawatan_tubuh.detail', compact('title_user','data'));
    }

    public function perawatan_rambut() {
        $title_user = 'Perawatan Rambut';
        $data = DataBarang::where('kategori_id', 7)->paginate(12);

        return view('users.pages_perawatan_rambut.index', compact('title_user','data'));
    }

    public function detail_perawatan_rambut($id) {
        $title_user = 'Detail Perawatan Rambut';
        $data = DataBarang::find($id);

        return view('users.pages_perawatan_rambut.detail', compact('title_user','data'));
    }

    public function keranjang() {
        $title_user = 'Keranjang';
        $user_login = Auth::user();
        $data_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->paginate(5);

        $total_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->sum('jumlah_harga');

        return view('users.pages_keranjang.index', compact('title_user','data_keranjang','total_keranjang'));
    }

    public function tambah_keranjang(Request $request, $id){
        $user_login = Auth::user();
        $get_barang = DataBarang::find($id);

        $rules = [
            'jumlah_barang' => 'required'
        ];
        
        $pesan = [
            'jumlah_barang.required' => 'Hai',
        ];

        $validasi = Validator::make($request->all(), $rules, $pesan);

        if($validasi->fails()) {
            // return response()->alert('Title','Lorem Lorem Lorem', 'success');
            // return response()->json(['success' => 0, 'text' => $validasi->errors()->first()], 422);
            Alert::warning('Perhatian', 'Jumlah Barang tidak boleh kosong!');
            return redirect()->back();
        }

        $model = new DataKeranjang;
        $model->user_id = $user_login->id;
        $model->barang_id = $get_barang->id;
        $model->nama_barang = $get_barang->nama_barang;
        $model->gambar_barang = $get_barang->gambar_barang;
        $model->jumlah_barang = $request->jumlah_barang;
        $model->status_keranjang = 1;
        // $get_barang->stok = $get_barang->stok - $request->jumlah_barang;
        $model->jumlah_harga = $get_barang->harga_jual * $request->jumlah_barang;

        // dd($model->jumlah_barang);
        $model->save();
        // $get_barang->save();

        Alert::success('Berhasil', 'Barang berhasil dimasukkan ke Keranjang!');
        return redirect('dashboard/keranjang');
    }

    public function hapus_keranjang($id) {
        $get_keranjang = DataKeranjang::findorfail($id);

        // $get_barang = DataBarang::where('id', $get_keranjang->barang_id)->first();
        // $get_barang->stok = $get_barang->stok + $get_keranjang->jumlah_barang;
        // $get_barang->save();
        $get_keranjang->delete();

        Alert::success('Terhapus', 'Barang berhasil dihapus dari daftar Keranjang!');
        return redirect()->back();
    }

    public function checkout() {
        $title_user = 'Checkout Pesanan';
        $user_login = Auth::user();
        $get_keranjang = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->paginate(5);

        $provinsi = DataWilayah::where('nama_wilayah', 'LIKE', '%Prov.%')->get();
        $kota = DataWilayah::where('nama_wilayah', 'LIKE', '%Kota%')->get();

        $total = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1
        ])->sum('jumlah_harga');

        $ongkos_kirim = $total * 0.5 / 100;
        $total_all = $total + $ongkos_kirim;

        return view('users.checkout', compact('title_user','provinsi','kota','total','ongkos_kirim','total_all','get_keranjang'));
    }

    public function submit_checkout(Request $request) {
        $user_login = Auth::user();
        // $get_keranjang = DataKeranjang::where([
        //     'user_id'=> $user_login->id,
        //     'status_keranjang' => 1,
        // ])->get();
        
        // $get_keranjang->status_keranjang = 0;
        // $get_keranjang->update();

        // Update Multi Pesanan
        $query = DataKeranjang::where([
            'user_id'=> $user_login->id,
            'status_keranjang' => 1,
        ])->get();

        $jam_hari_ini = date('Y-m-d H:i:s');

        foreach($query as $list) {
            $data[] = array(
                'user_id'   => $user_login->id,
                'barang_id' => $list->barang_id,
                'nama_barang' => $list->barang->nama_barang,
                'provinsi_id' => $request->provinsi,
                'kota_id' => $request->kota,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'pesan' => $request->pesan,
                'jenis_pengiriman_id' => $request->jenis_pengiriman,
                'total_harga_barang' => $list->barang->harga_jual,
                'ongkos_kirim' => $list->barang->harga_jual *0.5 / 100,
                'total_harga_seluruh' => $list->barang->harga_jual + ($list->barang->harga_jual * 0.5 / 100),
                'status_pesanan' => 1,
                'status_pembayaran' => 1,
                'created_at' => $jam_hari_ini,
                'updated_at' => $jam_hari_ini
            );
        }
        DB::table('data_pesanan')->insert($data);
        // $model = new DataPesanan;
        // $model->user_id = $user_login->id;
        // $model->barang_id = $get_keranjang->barang_id;
        // $model->nama_barang = $get_keranjang->barang->nama_barang;
        // $model->provinsi_id = $request->provinsi;
        // $model->kota_id = $request->kota;
        // $model->no_telp = $request->no_telp;
        // $model->alamat = $request->alamat;
        // $model->pesan = $request->pesan;
        // $model->jenis_pengiriman_id = $request->jenis_pengiriman;
        // $model->total_harga_barang = $get_keranjang->barang->harga_jual;
        // $model->ongkos_kirim = $get_keranjang->barang->harga_jual * 0.5 / 100;
        // $model->total_harga_seluruh = $get_keranjang->barang->harga_jual + ($get_keranjang->barang->harga_jual * 0.5 / 100);
        // $model->save();
        
        Alert::success('Berhasil', 'Selamat anda telah melakukan checkout!');
        return redirect('dashboard/status_pesanan');
    }

    public function pembayaran_pesanan() { 
        $title_user = 'Pembayaran Pesanan';

        return view('users.pembayaran_pesanan', compact('title_user'));
    }

    public function status_pesanan() { 
        $title_user = 'Status Pesanan';

        $data_pesanan = DataPesanan::orderby('created_at','DESC')->get();

        return view('users.status_pesanan', compact('title_user','data_pesanan'));
    }

    public function konfirmasi_pesanan() { 
        $title_user = 'Konfirmasi Pesanan';

        return view('users.konfirmasi_pesanan', compact('title_user'));
    }

    public function submit_pembayaran() {

        Alert::success('Berhasil', 'Selamat pembayaran anda telah berhasil!');
        return redirect('dashboard/keranjang');
    }

}