<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $master_status = Status::all();
        // $menu_master = Menu::all();
        $menu_master = Menu::whereNull('parent_code')
        ->with(['children.permissions', 'permissions']) // penting!
        ->orderBy('sequence')
        ->get();
    
        return view('back.status.index', compact('master_status', 'menu_master'));
    }

    public function add()
    {
        $menu_master = Menu::all();
        return view('back.status.formTambah', compact('menu_master'));
    }

    public function prosesAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $status = new Status();
        $status->name = $request->name;
        $status->description = $request->description;

        try {
            $status->save();
            return redirect()->route('status.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('status.index')->with('error', 'Data gagal ditambahkan');
        }
    }


    public function edit($id)
    {
        $menu_master = Menu::all();
        $status = Status::findOrFail($id); // Gunakan findOrFail agar error lebih jelas
        return view('back.status.formEdit', compact('status', 'menu_master')); // Gunakan compact
    }

    public function prosesEdit(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $status = Status::find($request->id);
        $status->name = $request->name;
        $status->description = $request->description;

        try {
            $status->save();
            return redirect()->route('status.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('status.index')->with('error', 'Data gagal diubah');
        }
    }

    public function delete($id)
    {
        $status = Status::find($id);
        $status->delete();
        return redirect()->route('status.index')->with('success', 'Data berhasil dihapus');
    }
}
