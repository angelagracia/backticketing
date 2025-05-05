<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Unit;
use App\Models\Topic;
use App\Models\Ticket;
use App\Mail\TicketAdded;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Models\TicketAttachment;
use Illuminate\Support\Facades\Mail;
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

    public function search(Request $request)
    {
        $ticketNumber = $request->input('ticket_number');

        $ticket = Ticket::where('ticket_number', $ticketNumber)->first();

        if ($ticket) {
            return view('front.layouts.detail_ticket_kc', compact('ticket'));
        } else {
            return redirect()->back()->with('error', 'Nomor ticket tidak ditemukan.');
        }
    }

    public function ticketlogin(Request $request)
    {
        $user = auth('portal')->user();

        $query = Ticket::where('user_id', $user->id);

        if ($request->filled('ticket_number')) {
            $query->where('ticket_number', 'like', '%' . $request->ticket_number . '%');
        }

        $tickets = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('front.layouts.home.home', compact('tickets'));
    }
    
    public function kirimcepat()
    {
    // Ambil data yang dibutuhkan
    $peran = Unit::all();
    $unit_kerja = UnitKerja::all();
    $kategori = Topic::all(); 
    $sub_kategory = Type::all();  // Ambil data sub_kategory

    // Kirim semua data ke view dalam satu return
    return view('front.layouts.input_form_kc', compact('peran', 'kategori', 'unit_kerja', 'sub_kategory'));

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

    // public function prosesSimpanLogin(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'email' => 'required|email|max:100',
    //         'no_telepon' => 'required|string|max:15',
    //         'title' => 'required|string|max:100',
    //         'unit_kerja' => 'required|exists:master_unit_kerja,id',
    //         'unit' => 'required|exists:master_units,id',
    //         'category' => 'required|exists:master_topic,id',
    //        'sub_category' => 'required|exists:master_topic_type,id',
    //         'deskripsi' => 'required|string',
    //         'lampiran.*' => 'file|mimes:png,jpg,jpeg,pdf|max:2048',
    //     ]);
    
    //     try {
    //         // Simpan tiket
    //         $ticket = Ticket::create([
    //             'name' => $request->name,
    //             'title' => $request->title,
    //             'email' => $request->email,
    //             'telepon' => $request->no_telepon,
    //             'unit_id' => $request->unit,
    //             'unit_kerja_id' => $request->unit_kerja,
    //             'topic_id' => $request->category,
    //             'type_id' => $request->sub_category,
    //             'req_description' => $request->deskripsi,
    //             'status_id' => 1,
    //         ]);

    //         // Simpan lampiran jika ada
    //         if ($request->hasFile('lampiran')) {
    //             foreach ($request->file('lampiran') as $file) {
    //                 $fileName = time() . '_' . $file->getClientOriginalName();
    //                 $filePath = $file->storeAs('uploads', $fileName, 'public');
    
    //                 TicketAttachment::create([
    //                     'ticket_id' => $ticket->id,
    //                     'file_name' => $file->getClientOriginalName(),
    //                     'file_path' => $filePath
    //                 ]);
    //             }
    //         }

    //         Mail::to($request->user()->email)->send(new TicketAdded($ticket));
          
    //         return redirect()->route('data_ticket_login', ['id' => $ticket->id])->with('success', 'Tiket berhasil dibuat!');

    //     } catch (\Exception $e) {
    //         dd($e->getMessage()); // Tampilkan pesan error
    //     }
        
    // }

    public function prosesSimpanLogin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_telepon' => 'required|string|max:15',
            'title' => 'required|string|max:100',
            'unit_kerja' => 'required|exists:master_unit_kerja,id',
            'unit' => 'required|exists:master_units,id',
            'category' => 'required|exists:master_topic,id',
            'sub_category' => 'required|exists:master_topic_type,id',
            'description' => 'required|string',
            'lampiran[].*' => 'file|mimes:png,jpg,jpeg,pdf|max:2048',

        ]);
    
        try {
            // Simpan tiket
            $ticket = Ticket::create([
                'name' => $request->name,
                'email' => $request->email,
                'telepon' => $request->no_telepon,
                'title' => $request->title,
                'unit_id' => $request->unit,
                'unit_kerja_id' => $request->unit_kerja,
                'topic_id' => $request->category,
                'type_id' => $request->sub_category,
                'req_description' => $request->description,
                'status_id' => 1,
                'user_id' => auth('portal')->id(),
            ]);
            

             // Simpan lampiran jika ada
            if ($request->hasFile('lampiran')) {
                // dd($request->file('lampiran'));
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
    
            // Redirect dengan sukses
            return redirect()->route('data_ticket_login', ['id' => $ticket->id])->with('success', 'Tiket berhasil dibuat!');
            
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage()); // Untuk melihat pesan error lebih detail
        }

        // pencarian nomer ticket
        
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

    public function searchTicket(Request $request)
{
    // Ambil input dari form pencarian
    $search = $request->input('subs-email');

    // Cari tiket berdasarkan nomor tiket
    $ticket = Ticket::where('ticket_number', 'like', '%' . $search . '%')->first();

    // Kembalikan hasil pencarian ke view
    return view('front.layouts.detail_ticket_kc', compact('ticket'));
}


    public function searchTicketLogin(Request $request)
{
    $search = $request->input('subs-email');

    $ticket = Ticket::where('ticket_number', 'like', '%' . $search . '%')->first();

    if (!$ticket) {
        return view('front.layouts.detail_tiket')->with('message', 'Tiket tidak ditemukan.');
    }

    return view('front.layouts.detail_tiket', compact('ticket'));
}

    public function close_ticket($id)
{
    $ticket = Ticket::findOrFail($id);

    // Cek apakah user yang login adalah pemilik tiket
    if (auth('portal')->id() !== $ticket->user_id) {
        abort(403, 'Anda tidak berhak menutup tiket ini.');
    }

    // Cek status tiket, jika belum ditutup
    if (in_array($ticket->status_id, [1, 2])) { // 1=open, 2=process
        $ticket->status_id = 3; // 3 = closed
        $ticket->closed_at = now(); // jika pakai kolom ini
        $ticket->save();

        return redirect()->route('home.detail_ticket_closed')->with('success', 'Tiket berhasil ditutup.');
    }

    return redirect()->back()->with('error', 'Tiket sudah ditutup sebelumnya.');
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
