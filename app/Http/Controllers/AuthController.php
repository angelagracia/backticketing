<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //menampilklan halaman login
    public function signin()
    {
        return view('front.layouts.login');
    }

    // Proses login
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // Redirect ke dashboard jika sukses
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    //Proses Log Out
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
