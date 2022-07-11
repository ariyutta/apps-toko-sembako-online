<?php

namespace App\Http\Controllers;

use App\Models\DataPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataPaymentController extends Controller
{
    public function data_payment() {
        $title_admin = 'Data Payment';
        $data_payment = DataPayment::orderby('created_at','DESC')->get();

        return view('admins.data_payment.index', compact('title_admin','data_payment'));
    }

    public function tambah_data_payment(Request $request) {

        $validatedData = $request->validate([
            'nama_payment'  => 'required|max:100',
            'no_payment'  => 'required|max:100'
        ]);

        $model = new DataPayment();
        $model->nama_payment = $request->nama_payment;
        $model->no_payment = $request->no_payment;
        $model->save();

        Alert::success('Berhasil', 'Data Payment berhasil ditambahkan!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_payment');

    }

    public function ubah_data_payment($id) {
        $title_admin = 'Edit Data Payment';
        $data_payment = DataPayment::find($id);

        return view('admins.data_payment.ubah_data', compact('title_admin','data_payment'));
    }

    public function simpan_data_payment(Request $request, $id) {
        $data_payment = DataPayment::find($id);

        $data_payment->update([
            'nama_payment' => $request->nama_payment,
            'no_payment'  => $request->no_payment
        ]);

        Alert::success('Berhasil', 'Data Payment telah berhasil diperbarui!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_payment');
    }

    public function hapus_data_payment($id) {
        $data_payment = DataPayment::findorfail($id);
        $data_payment->delete();

        Alert::success('Berhasil', 'Data Payment berhasil dihapus!');
        return redirect(''.Auth::user()->role_user->role->name.'/data_payment');
    }
}
