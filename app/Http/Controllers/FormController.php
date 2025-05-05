<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\LoginRequest;

class FormController extends Controller
{
    public function prosesSimpan(Request $request)
    {
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
            'lampiran.*' => 'nullable|file|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);

        // Handle upload file jika ada
        $filePaths = [];
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $filePaths[] = $file->store('lampiran', 'public');
            }
        }

        // Simpan ke database dan simpan hasilnya ke variabel $ticket
        $formData = $request->except('lampiran');
        $formData['lampiran'] = json_encode($filePaths);
        $ticket = LoginRequest::create($formData);

        // Redirect ke halaman detail tiket kc
        return redirect()->route('detail_ticket_kc', ['id' => $ticket->id]);
    }

    public function detail_ticket_kc($id)
    {
        $ticket = \App\Models\LoginRequest::with(['unit', 'topic', 'subCategory', 'status'])->findOrFail($id);
        return view('front.layouts.detail_ticket_kc', compact('ticket'));
    }
    
}
