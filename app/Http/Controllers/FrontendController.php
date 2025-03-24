<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Unit;
use App\Models\Topic;
use App\Models\Ticket;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Models\TicketAttachment;
use Illuminate\Support\Facades\Storage;

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
        $kategori = Topic::all(); 
        $sub_kategory = Type::all();
        return view('front.layouts.input_form_kc', compact('peran','kategori','unit_kerja','sub_kategory'));
    }
    
    public function prosesSimpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'judul' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_telepon' => 'required|string|max:15',
            'unit_kerja' => 'required|exists:master_unit_kerja,id',
            'unit' => 'required|exists:master_units,id',
            'category' => 'required|exists:master_topic,id',
            'sub_category' => 'required|exists:master_topic_type,id',
            'deskripsi' => 'required|string',
            'lampiran.*' => 'file|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);
    
        try {
            // Simpan tiket
            $ticket = Ticket::create([
                'name' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->no_telepon,
                'unit_id' => $request->unit,
                'unit_kerja_id' => $request->unit_kerja,
                'topic_id' => $request->category,
                'type_id' => $request->sub_category,
                'title' => $request->judul,
                'req_description' => $request->deskripsi,
                'status_id' => 1,
            ]);

            // Simpan lampiran jika ada
            if ($request->hasFile('lampiran')) {
                foreach ($request->file('lampiran') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('uploads', $fileName, 'public');
    
                    TicketAttachment::create([
                        'ticket_id' => $ticket->id,
                        'file_name' => $file->getClientOriginalName(),
                        'file_path' => $filePath
                    ]);
                }
            }
          
            return redirect()->route('detail_ticket_kc', ['id' => $ticket->id])->with('success', 'Tiket berhasil dibuat!');

        } catch (\Exception $e) {
            return redirect()->route('ticket.index')->with('error', 'Data gagal ditambahkan. ' . $e->getMessage());
        }
    }
    
    public function detail_ticket_kc($id)
    {
        // Ambil data tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);
    
        return view('front.layouts.detail_ticket_kc', compact('ticket'));
    }
    
    public function input_form()
    {
        $peran = Unit::all();
        $unit_kerja = UnitKerja::all();
        $kategori = Topic::all(); 
        $sub_kategory = Type::all();
        return view('front.layouts.input_form', compact('peran','kategori','unit_kerja','sub_kategory'));
    }

    
    public function prosesSimpanLogin(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'judul' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_telepon' => 'required|string|max:15',
            'unit_kerja' => 'required|exists:master_unit_kerja,id',
            'unit' => 'required|exists:master_units,id',
            'category' => 'required|exists:master_topic,id',
            'sub_category' => 'required|exists:master_topic_type,id',
            'deskripsi' => 'required|string',
            'lampiran.*' => 'file|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);
    
        try {
            // Simpan tiket
            $ticket = Ticket::create([
                'name' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->no_telepon,
                'unit_id' => $request->unit,
                'unit_kerja_id' => $request->unit_kerja,
                'topic_id' => $request->category,
                'type_id' => $request->sub_category,
                'title' => $request->judul,
                'req_description' => $request->deskripsi,
                'status_id' => 1,
            ]);

            // Simpan lampiran jika ada
            if ($request->hasFile('lampiran')) {
                foreach ($request->file('lampiran') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('uploads', $fileName, 'public');
    
                    TicketAttachment::create([
                        'ticket_id' => $ticket->id,
                        'file_name' => $file->getClientOriginalName(),
                        'file_path' => $filePath
                    ]);
                }
            }
          
            return redirect()->route('data_ticket_login', ['id' => $ticket->id])->with('success', 'Tiket berhasil dibuat!');

        } catch (\Exception $e) {
            return redirect()->route('ticket.index')->with('error', 'Data gagal ditambahkan. ' . $e->getMessage());
        }
    }


    public function data_ticket_login($id)
{
    $ticket = Ticket::findOrFail($id);
    return view('front.layouts.data_ticket_login', compact('ticket'));
}

    

public function show($id)
{
    // Cari tiket berdasarkan ID
    $ticket = Ticket::findOrFail($id);

    // Ambil data berdasarkan hubungan relasional (jika sudah ada relasi di model Ticket)
    $unit = Unit::find($ticket->unit_id);
    $unit_kerja = UnitKerja::find($ticket->unit_kerja_id);
    $topic = Topic::find($ticket->topic_id);
    $type = Type::find($ticket->type_id);

    // Kirim data ke tampilan
    return view('front.layouts.detail_tiket', compact('ticket', 'unit', 'unit_kerja', 'topic', 'type'));
}

    
    public function updateTicket(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json(['error' => 'Tiket tidak ditemukan'], 404);
        }

        $ticket->judul = $request->judul;
        $ticket->deskripsi = $request->deskripsi;
        $ticket->category = $request->category;
        $ticket->sub_category = $request->sub_category;
        $ticket->save();

        return response()->json(['success' => 'Tiket berhasil diperbarui']);
    }


    public function edit($id)
    {
        $master_unit = Unit::all();
        $unit_kerja = UnitKerja::all();
        $topic_master = Topic::all();
        $master_type = Type::all();
        $ticket = Ticket::findOrFail($id);
        // return view('back.topic.formEdit', ['topic' => $topic, 'master_menu' => $menu_master]);
        return view('front.layouts.home.formEdit', compact('ticket','master_unit','unit_kerja','topic_master','master_type'));
    }

    public function prosesUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'unit' => 'required',
            'unit_kerja' => 'required',
            'category' => 'required',  
            'sub_category' => 'required',  
            'judul' => 'required',
            'deskripsi' => 'required', 
            'lampiran.*' => 'mimes:jpg,jpeg,png,pdf,docx|max:2048',
        ]);
        
        $ticket = Ticket::findOrFail($request->id);

        $ticket->update([
            'name' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->no_telepon,
            'unit_id' => $request->unit,
            'unit_kerja_id' => $request->unit_kerja,
            'topic_id' => $request->category,  
            'type_id' => $request->sub_category,  
            'title' => $request->judul,
            'req_description' => $request->deskripsi, 
        ]);
        

        if ($request->delete_lampiran) {
            foreach ($request->delete_lampiran as $attachId) {
                $attachment = TicketAttachment::find($attachId);
                if ($attachment) {
                    Storage::delete('public/' . $attachment->file_path);
                    $attachment->delete();
                }
            }
        }

        // Simpan lampiran baru jika ada
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $filePath = $file->store('uploads', 'public');
                TicketAttachment::create([
                    'ticket_id' => $ticket->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $filePath,
                ]);
            }
        }
        
        // Redirect ke halaman tiket setelah update
        return redirect()->route('data_ticket_login', ['id' => $ticket->id])
        ->with('success', 'Data berhasil diubah');

    }







    public function detail_ticket_closed()
    {
        return view('front.layouts.detail_ticket_closed');
    }


    // public function input_form_kc()
    // {
    //     return view('front.layouts.input_form_kc');
    // }

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
