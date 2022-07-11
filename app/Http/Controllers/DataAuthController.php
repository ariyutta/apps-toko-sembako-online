<?php

namespace App\Http\Controllers;

use App\Models\DataKeranjang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DataAuthController extends Controller
{
    public function ubah_password() {
        $title_admin = 'Ubah Password';
        $user = auth()->user()->id;
        $data = User::where('id', $user)->first();

        return view('admins.data_auth.ubah_password', compact('title_admin'));
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
            return redirect(''.Auth::user()->role_user->role->name.'');
        } 
        else {
            Alert::error('Gagal', 'Password yang anda masukkan tidak benar!');
        }
    }
}
