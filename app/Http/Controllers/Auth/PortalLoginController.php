<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserPortal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PortalLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-portal');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('portal')->attempt($credentials)) {
            $request->session()->regenerate(); // penting untuk mencegah session fixation
            return redirect()->intended('/home');
        }
    
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    

    
    public function logout()
    {
        Auth::guard('portal')->logout();
        return redirect('/login/portal');
    }
}






