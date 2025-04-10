<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalDashboardController extends Controller
{
    public function index() {
        return view('front.layouts.home.home');
    }
}
