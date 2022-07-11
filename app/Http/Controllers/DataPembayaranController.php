<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataPembayaranController extends Controller
{
    public function verifikasi_pembayaran() {
        $title_admin = 'Verifikasi Pembayaran';
        $data_pesanan = DataPesanan::orderby('created_at','DESC')->get();

        return view('admins.verifikasi_pembayaran.index', compact('title_admin','data_pesanan'));
    }

    public function verif_bayar($id) {
        $data = DataPesanan::find($id);

        $data->update([
            'status_pembayaran' => 1
        ]);

        Alert::success('Berhasil', 'Pembayaran pada Kode Pesanan '.$data->kode_pesanan.' sudah berhasil diverifikasi!');
        return redirect()->back();
    }

    public function batal_verif($id) {
        $data = DataPesanan::find($id);

        $data->update([
            'status_pembayaran' => 0
        ]);

        Alert::success('Berhasil', 'Pembayaran pada Kode Pesanan '.$data->kode_pesanan.' sudah dibatalkan!');
        return redirect()->back();
    }
}
