<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function loginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == User::DISABLED_STATUS)
                return redirect()
                    ->route('login')
                    ->withErrors('Your account has been deactivated. Please contact your administrator.');
            if (Auth::user()->role == 'admin') return redirect()->route('admin.home');
        }
        return redirect()->route('login')->withErrors('Email address or password is incorrect!');
    }

    public function admin()
    {
        return view('admin.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
