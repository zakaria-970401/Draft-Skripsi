<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WalasAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:teacher')->except('walaslogout', 'adminlogout');
    }

    public function getLogin()
    {
        return view('auth.walas.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('teacher')->attempt($credential, $request->member)) {
            // If login succesful, then redirect to their intended location
            Alert::success('Sukses', 'Selamat Datang!!');
            return redirect()->intended(route('walas.home'));
        }
        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email'));
    }

    public function walaslogout()
    {
        auth()->guard('teacher')->logout();
        session()->flush();

        return redirect()->route('walas.login');
    }
}
