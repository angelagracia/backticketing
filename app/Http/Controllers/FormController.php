<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\LoginRequest; 

class FormController extends Controller
{
    public function prosesSimpanLogin(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'judul' => 'required',
            'email' => 'required|email',
            'unit_kerja' => 'required',
            'deskripsi' => 'required',
            'no_telepon' => 'required',
            'unit' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'lampiran' => 'nullable|file|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);

        // Simpan data ke database 
        LoginRequest::create($request->all());

        // Set flash session agar alert muncul di tampilan
        Session::flash('success', 'Data Berhasil Dikirim!');

        // Redirect kembali ke halaman form
        return redirect()->back();
    }
}
