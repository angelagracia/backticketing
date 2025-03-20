<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Topic;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('front.layouts.index');
    }

    public function faqs()
    {
        return view('front.layouts.faqs');
    }

    public function faqs_login()
    {
        return view('front/layouts.faqs_login');
    }

    public function contact()
    {
        return view('front.layouts.contact');
    }

    public function contact_login()
    {
        return view('front.layouts.contact_login');
    }

    public function kirimcepat()
    {
        $peran = Unit::all();
        $unit_kerja = UnitKerja::all();
        $kategori = Topic::all(); 
        return view('front.layouts.input_form_kc', compact('peran','kategori','unit_kerja'));
    }

    public function detail_ticket_kc()
    {
        return view('front.layouts.detail_ticket_kc');
    }

    public function data_ticket_login()
    {
        return view('front.layouts.data_ticket_login');
    }

    public function detail_ticket()
    {
        return view('front.layouts.detail_ticket');
    }

    public function detail_ticket_closed()
    {
        return view('front.layouts.detail_ticket_closed');
    }

    public function input_form()
    {
        return view('front.layouts.input_form');
    }

    public function input_form_kc()
    {
        return view('front.layouts.input_form_kc');
    }

    public function forgetpassword()
    {
        return view('front.layouts.forgetpassword');
    }

    public function home()
    {
        return view('front.layouts.home.home');
    }

    public function akun()
    {
        return view('front.layouts.home.akun');
    }

    public function profile()
    {
        return view('front.layouts.home.profile');
    }
}
