<?php

namespace App\Http\Controllers;

use App\Models\DataKeranjang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PagesAuthController extends Controller
{
    public function ubah_password() {
        $title_user = 'Ubah Password';
        $user = auth()->user()->id;
        $data = User::where('id', $user)->first();
        $notif_cart = DataKeranjang::where('status_notif','!=', 0)->count();

        return view('users.pages_auth.ubah_password', compact('title_user','notif_cart'));
    }

    public function update_password(Request $request) {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required','min:8','confirmed'],
        ]);

        if(Hash::check($request->current_password, Auth::user()->password)) {
            DB::transaction(function () use ($request) {
                $user = auth()->user()->id;
                $data = User::where('id', $user)->first();
                $data->password = Hash::make($request->password);
                $data->save();
                Alert::success('Berhasil', 'Password telah berhasil diperbarui!');
            });
            return redirect('home');
        } 
        else {
            Alert::error('Gagal', 'Password yang anda masukkan tidak benar!');
        }
    }
}
