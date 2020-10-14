<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class LoginController extends Controller
{
    public function post_loginadmin(Request $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            Alert::error('Gagal', 'Email Atau Password Salah!');
            return redirect()->back();
        }
        Alert::success('Berhasil', 'Selamat Datang!');
        return redirect('/siswa');
    }

    public function get_loginadmin()
    {
        return view('authAdmin.login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
