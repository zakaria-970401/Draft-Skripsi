<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout', 'adminlogout', 'walaslogout');
    }

    public function getLogin()
    {
        return view('auth.admin.login');
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
        if (Auth::guard('admin')->attempt($credential, $request->member)) {
            // If login succesful, then redirect to their intended location
            Alert::success('Sukses', 'Selamat Datang!!');
            return redirect()->intended(route('admin.home'));
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function adminlogout()
    {
        auth()->guard('admin')->logout();
        session()->flush();
        return redirect()->route('admin.login');
    }
}
