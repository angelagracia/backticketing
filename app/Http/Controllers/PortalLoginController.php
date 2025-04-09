<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-portal');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('portal')->attempt($credentials)) {
            return redirect()->intended('/dashboard-portal');
        }

        return back()->withErrors(['email' => 'Login portal gagal']);
    }

    public function logout()
    {
        Auth::guard('portal')->logout();
        return redirect('/login-portal');
    }
}



