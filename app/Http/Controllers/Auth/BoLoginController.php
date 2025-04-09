<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BoLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.bo-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('bo')->attempt($credentials)) {
            return redirect()->intended('/dashboard-bo');
        }

        return back()->withErrors(['email' => 'Login gagal']);
    }

    public function logout()
    {
        Auth::guard('bo')->logout();
        return redirect('/login-bo');
    }
}

