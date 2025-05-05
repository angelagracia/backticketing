<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Topic;
use App\Models\Status;
use App\Models\Ticket;
use App\Mail\TicketAdded;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Models\TicketHistory;
use App\Mail\TicketCreatedMail;
use App\Models\TicketAttachment;
use App\Models\TicketConfirmation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Notifications\TicketCreatedNotification;

class TicketController extends Controller
{
    public function index()
    {
        
        $ticket = Ticket::all();
        $status = Status::all();
        $menu_master = Menu::whereNull('parent_code')
        ->with(['children.permissions', 'permissions'])
        ->orderBy('sequence')
        ->get();
        // $menu_master = Menu::whereNull('parent_code')->with('children')->orderBy('sequence')->get();
        return view('back.ticket.index', compact('ticket', 'menu_master'));
    }

    public function addData()
    {
        $menu_master = Menu::all();
        $master_unit = Unit::all();
        $unit_kerja = UnitKerja::all();
        $topic_master = Topic::all();
        $master_type = Type::all();
        $master_status = Status::all();
        return view('back.ticket.addData', compact('menu_master','master_unit','unit_kerja','topic_master','master_type','master_status'));
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->input('topic_id');  // Ambil ID kategori yang dipilih
    
        // Validasi apakah kategori ada
        $category = Topic::find($categoryId);
        if (!$category) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
        }
    
        // Ambil subkategori berdasarkan category_id
        $subCategories = Type::where('topic_id', $categoryId)->get();
    
        // Periksa apakah subkategori ditemukan
        if ($subCategories->isEmpty()) {
            return response()->json(['message' => 'Subkategori tidak ditemukan'], 404);
        }
    
        // Kembalikan data dalam format JSON
        return response()->json($subCategories);
    }

    public function prosesTambah(Request $request)
{
    // dd($request->all());
    // Validasi input
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'no_telepon' => 'required',
        'unit_id' => 'required',
        'unit_kerja_id' => 'required',
        'topic_id' => 'required',
        'type_id' => 'required',
        'judul' => 'required',
        'description' => 'required',
        'lampiran.*' => 'mimes:jpg,jpeg,png,pdf,docx|max:2048', // Validasi format file & ukuran max 2MB
    ]);

    // Simpan data ticket
    try {
        $ticket = Ticket::create([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->no_telepon,
            'unit_id' => $request->unit_id,
            'unit_kerja_id' => $request->unit_kerja_id,
            'topic_id' => $request->topic_id,
            'type_id' => $request->type_id,
            'title' => $request->judul,
            'req_description' => $request->description,
            'status_id' => 1, // Status otomatis Open
            
        ]);

        // Jika ticket berhasil disimpan & ada lampiran
        if ($ticket && $request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $filePath = $file->store('lampiran', 'public');

                TicketAttachment::create([
                    'ticket_id' => $ticket->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $filePath
                ]);
            }
        }

        Mail::to($ticket->email)->send(new TicketCreatedMail($ticket));

        return redirect()->route('ticket.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('ticket.index')->with('error', 'Data gagal ditambahkan. ' . $e->getMessage());
        }
    }   

    public function edit($id)
    {
        $master_unit = Unit::all();
        $unit_kerja = UnitKerja::all();
        $topic_master = Topic::all();
        $master_type = Type::all();
        $ticket = Ticket::findOrFail($id);
        $menu_master = Menu::all();
        // return view('back.topic.formEdit', ['topic' => $topic, 'master_menu' => $menu_master]);
        return view('back.ticket.formEdit', compact('ticket', 'menu_master','master_unit','unit_kerja','topic_master','master_type'));
    }

    public function prosesEdit(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'unit' => 'required',
            'unit_kerja' => 'required',
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'judul' => 'required',
            'description' => 'required',
            'lampiran.*' => 'mimes:jpg,jpeg,png,pdf,docx|max:2048',
        
        ]);

        // Cari tiket berdasarkan ID
        $ticket = Ticket::findOrFail($request->id);

        // Update data tiket
        $ticket->update([
            'name' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->no_telepon,
            'unit_id' => $request->unit,
            'unit_kerja_id' => $request->unit_kerja,
            'topic_id' => $request->kategori,
            'type_id' => $request->sub_kategori,
            'title' => $request->judul,
            'req_description' => $request->description,
        
        ]);

        TicketHistory::create([
            'ticket_id' => $ticket->id,
            'status_id' => $ticket->status_id,
            'description' => 'Data tiket diperbarui oleh admin.',
        ]);

        // Hapus lampiran yang dipilih
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
                $filePath = $file->store('lampiran', 'public');
                TicketAttachment::create([
                    'ticket_id' => $ticket->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $filePath,
                ]);
            }
        }
        // Redirect ke halaman tiket setelah update
        return redirect()->route('ticket.index')->with('success', 'Data berhasil diubah');
    }


    public function detail($id)
    {
        $ticket = Ticket::findOrFail($id);
        $master_unit = Unit::all();
        $unit_kerja = UnitKerja::all();
        $topic_master = Topic::all();
        $master_type = Type::all();
        $menu_master = Menu::all();
        return view('back.ticket.formDetail', compact('ticket', 'menu_master','master_unit','unit_kerja','topic_master','master_type'));

    }

    public function konfirmasi($id)
    {
        $ticket = Ticket::findOrFail($id);
        // $ticket->status_id = 3; // Status otomatis Closed
        // $ticket->save();

        // TicketHistory::create([
        //     'ticket_id' => $ticket->id,
        //     'status_id' => 3,
        //     'description' => 'Tiket ditutup oleh admin.',
        // ]);

        // return redirect()->route('ticket.index')->with('success', 'Data berhasil diubah');
        return view('back.ticket.konfirmasi', compact('ticket'));
    }

    public function prosesKonfirmasi(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
        ]);

        $ticket = Ticket::findOrFail($id);

        $lampiranPath = null;

        
        $konfirmasi = TicketConfirmation::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::check() ? Auth::id() : null,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lampiran' => $lampiranPath,
        ]);
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $path = $file->store('lampiran_konfirmasi', 'public');
                $konfirmasi->attachments()->create([
                    'file_path' => $path,
                ]);
            }
        }

        $ticket->update(['status_id' => 3]); 

        return redirect()->route('ticket.index')->with('success', 'Ticket berhasil ditutup.');
    }



    public function delete($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('ticket.index')->with('success', 'Data berhasil dihapus');
    }

    
    public function proses($id)
    {

        $ticket = Ticket::findOrFail($id);

        $ticket->status_id = 2;  
        
        // Simpan perubahan
        $ticket->save();

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Status tiket berhasil diubah.');
        $ticket = Ticket::findOrFail($id);

        TicketHistory::create([
            'ticket_id' => $ticket->id,
            'status_id' => $request->status_id,
            'description' => 'Status diubah dari ' . $oldStatus . ' ke ' . $request->status_id,
        ]);
        
        // Pastikan hanya mengupdate status_id, bukan status
        $ticket->status_id = 2; // Contoh: 2 = "In Progress"
        
        // Simpan perubahan
        $ticket->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Status tiket berhasil diubah.');
    }

    public function updateTicketStatus($ticketId, $newStatusId)
{
    // Cari tiket berdasarkan ID
    $ticket = Ticket::findOrFail($ticketId);

    // Simpan status tiket lama ke riwayat
    $ticket->histories()->create([
        'status_id' => $ticket->status_id, // status lama
        'description' => 'Status berubah menjadi ' . $ticket->status->name, // Deskripsi perubahan status
    ]);

    // Update status tiket ke status baru
    $ticket->status_id = $newStatusId;
    $ticket->save();

    // Ambil status baru setelah update
    $newStatus = Status::findOrFail($newStatusId);

    // Menyimpan riwayat untuk status baru
    $ticket->histories()->create([
        'status_id' => $newStatusId, // status baru
        'description' => 'Status diperbarui menjadi ' . $newStatus->name, // Deskripsi perubahan status
    ]);

    // Redirect atau tampilkan halaman dengan status yang telah diperbarui
    return redirect()->route('ticket.details', ['ticketId' => $ticket->id])
                     ->with('success', 'Status tiket berhasil diperbarui!');
}


public function showChat($ticket_id)
{
    $ticket = Ticket::findOrFail($ticket_id);

    if (auth('bo')->check()) {
        $user_id = $ticket->user_portal_id; // <-- user portal id
    } elseif (auth('portal')->check()) {
        $user_id = $ticket->admin_id; // <-- admin id
    } else {
        abort(403);
    }

    return view('user-chat', [
        'ticket_id' => $ticket_id,
        'user_id' => $user_id,
    ]);
}



    

    

    


    // controller untuk menangani tampilan ticket
    public function searchTicket(Request $request)
    {
        $email = $request->get('subs-email');
    
        // Cari tiket berdasarkan nomor tiket
        $ticket = Ticket::where('ticket_number', $email)->with('histories.status')->first();
    
        // Debug: Cek apakah tiket ditemukan dan apakah riwayat sudah dimuat
        dd($ticket);
    
        if (!$ticket) {
            abort(404, 'Tiket tidak ditemukan');
        }
    
        return view('front.layouts.detail_tiket', compact('ticket'));
    }

    public function dashboard()
    {
        $totalTicketsOpen = Ticket::where('status', 'Opens')->count();
        return view('dashboard', compact('totalTicketsOpen'));
    }
    

    


}
