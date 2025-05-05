<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Type;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
{
    // $menu_master = Menu::all(); 
    $menu_master = Menu::whereNull('parent_code')
    ->with(['children.permissions', 'permissions'])
    ->orderBy('sequence')
    ->get();

    $topic_master = Topic::all(); // Ambil daftar topik
    return view('back.kategori.index', compact('menu_master', 'topic_master'));
}

    public function tambah() {
        $menu_master = Menu::all();
        return view('back.kategori.formTambah', compact('menu_master'));
    }

    public function prosesTambah(Request $request) {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $topic = new Topic();
        $topic->name = $request->name;
        $topic->description = $request->description;

        try {
            $topic->save();
            return redirect()->route('topic.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('topic.index')->with('error', 'Data gagal ditambahkan');
        } 
    }

    public function edit($id) {
        $topic = Topic::findOrFail($id);
        $menu_master = Menu::all();
        // return view('back.topic.formEdit', ['topic' => $topic, 'master_menu' => $menu_master]);
        return view('back.kategori.formEdit', compact('topic', 'menu_master'));
    }

    public function prosesEdit(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $topic = Topic::findOrFail($request->id);
        $topic->name = $request->name;
        $topic->description = $request->description;

        try {
            $topic->save();
            return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Data gagal diubah');
        }
    }

    public function detail($id)
    {
        $topic = Topic::findOrFail($id);
        $menu_master = Menu::all();
        return view('back.kategori.detail', compact('topic', 'menu_master'));
    }

    public function hapus($id) {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }

}
