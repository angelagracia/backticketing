<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Type;
use App\Models\Topic;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $master_type = Type::all();
        $menu_master = Menu::whereNull('parent_code')
        ->with(['children.permissions', 'permissions']) // penting!
        ->orderBy('sequence')
        ->get();
    
        return view('back.sub_kategori.index', compact('master_type','menu_master'));
    }

    public function tambah()
    {
        $menu_master = Menu::all();
        $master_topic = Topic::all(); // Ambil semua data kategori
        return view('back.sub_kategori.formTambah', compact('master_topic','menu_master'));
    }

    public function prosesTambah(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'topic_id' => 'required',
        ]);

        $type = new Type();
        $type->name = $request->name;
        $type->topic_id = $request->topic_id;

        try {
            $type->save();
            return redirect()->route('sub_kategori.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('sub_kategori.index')->with('error', 'Data gagal ditambahkan');
        } 
    }

    public function ubah($id)
    {
        $master_type = Type::findOrFail($id);
        $master_topic = Topic::all(); // Ambil semua data kategori
        return view('back.sub_kategori.formEdit', compact('master_type', 'master_topic'));
    }

    public function prosesUbah(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required',
            'topic_id' => 'required',
        ]);
    
        // Mencari data berdasarkan ID yang dikirimkan dari form
        $type = Type::findOrFail($request->id);
    
        // Update data berdasarkan inputan form
        $type->name = $request->name;
        $type->topic_id = $request->topic_id;
    
        // Cobalah untuk menyimpan perubahan
        try {
            $type->save(); // Menyimpan data yang telah diperbarui
            return redirect()->route('type.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            // Jika gagal, tampilkan pesan error
            return redirect()->route('type.index')->with('error', 'Data gagal diubah');
        }
    }


    public function detail($id)
    {
        $master_type = Type::findOrFail($id);
        $master_topic = Topic::all(); // Ambil semua data kategori
        return view('back.sub_kategori.formDetail', compact('master_type', 'master_topic'));
    }

    public function hapus($id)
    {
        $type = Type::findOrFail($id);
        try {
            $type->delete();
            return redirect()->route('type.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('type.index')->with('error', 'Data gagal dihapus');
        }
    }
    
    
}
