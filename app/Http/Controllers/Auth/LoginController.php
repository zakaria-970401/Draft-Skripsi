<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/siswa';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'logoutadmin');
    }

    public function getlogin()
    {
        return view('auth.login');
    }

    // public function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('admin')) {
    //         Alert::success('Sukses', 'Selamat Datang!');
    //         return redirect()->route('admin.home');
    //     } elseif ($user->hasRole('user')) {
    //         Alert::success('Sukses', 'Selamat Datang!');
    //         return redirect()->route('siswa.home');
    //     }
    //     Alert::failed('Oppps', 'Username Atau Password Salah!');
    // }

    public function logout()
    {
        return redirect('login')->with(Auth::logout());
    }
}
