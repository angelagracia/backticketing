<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Topic;
use App\Models\Ticket;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Models\TicketAttachment;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index()
    {
        
        $ticket = Ticket::all();
        $menu_master = Menu::all();
        // $menu_master = Menu::whereNull('parent_code')->with('children')->orderBy('sequence')->get();
        return view('back.ticket.index', compact('ticket', 'menu_master'));
    }

    public function add()
    {
        $menu_master = Menu::all();
        $master_unit = Unit::all();
        $unit_kerja = UnitKerja::all();
        $topic_master = Topic::all();
        $master_type = Type::all();
        return view('back.ticket.add', compact('menu_master','master_unit','unit_kerja','topic_master','master_type'));
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


    public function delete($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('ticket.index')->with('success', 'Data berhasil dihapus');
    }

    
    public function proses($id)
    {
        // Cari tiket berdasarkan ID

        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'Processed';

        // Ubah status tiket menjadi "In Progress" atau status yang sesuai
        $ticket->status_id = 2;  // Misalnya 2 untuk status "In Progress"
        
        // Simpan perubahan
        $ticket->save();

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Status tiket berhasil diubah.');
    }


}
