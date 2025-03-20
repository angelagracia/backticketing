<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $master_users = User::all();
        $menu_master = Menu::all(); 
        return view('back.user.index', compact('master_users', 'menu_master'));
    }
}
