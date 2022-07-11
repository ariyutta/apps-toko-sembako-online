<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status_verifikasi = 0;
        $user->gambar_profil = 'default/default.png';
        $user->role_id = $request->role_id;
        $user->save();

        $user->attachRole($request->role_id);
        event(new Registered($user));

        Auth::login($user);

        Alert::success('Berhasil', 'Akun anda berhasil dibuat!');
        
        if(Auth::user()->role_user->role_id == 1) {
            return redirect(RouteServiceProvider::DEVELOPER);
        }
        else if(Auth::user()->role_user->role_id == 2) {
            return redirect(RouteServiceProvider::ADMINISTRATOR);
        }
        else if(Auth::user()->role_user->role_id == 3) {
            return redirect(RouteServiceProvider::HOME);
        }
    }
}