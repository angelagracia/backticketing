<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\View\View;
use App\Models\UserPortal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPortalAuthController extends Controller
{

    public function index()
    {
        // return view('layouts.default');
        $menu_master = Menu::all(); 
        return view('back.backoffice', compact('menu_master'));
    }

    // public function create(): View
    // {
    //     return view('auth.user_portal_login');
    // }



    public function showLoginForm()
    {
        return view('auth.user_portal_login');
    }
    
    public function loginPortal(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Gunakan guard yang sesuai
        if (Auth::guard('users_portal')->attempt($credentials)) {
            return redirect()->route('user_portal.dashboard');
        }
    
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    

    public function logout()
    {
        Auth::guard('users_portal')->logout();
        return redirect()->route('users_portal.login');
    }


}
