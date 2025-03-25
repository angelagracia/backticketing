<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index()
    {
        $hak_akses = HakAkses::all();
        $menu_master = Menu::whereNull('parent_code')->with('children')->orderBy('sequence')->get();
        return view('back.hak-akses.index', compact('hak_akses','menu_master'));
    }
}
