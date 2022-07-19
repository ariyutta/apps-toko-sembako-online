<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;
use App\Models\ReturPenjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReturPenjualanController extends Controller
{
    public function retur_penjualan() {
        $title_admin = 'Retur Penjualan';
        $retur_penjualan = ReturPenjualan::orderby('created_at','DESC')->get();

        return view('admins.retur_penjualan.index', compact('title_admin','retur_penjualan'));
    }

    public function terima_retur($id) {
        $data = ReturPenjualan::find($id);

        $data->update([
            'status_aktif' => 2
        ]);

        Alert::success('Berhasil', 'Pesanan pada Kode Pesanan '.$data->pesanan->kode_pesanan.' sudah berhasil dikembalikan!');
        return redirect()->back();
    }
}
