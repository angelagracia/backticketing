<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $unit_kerja = UnitKerja::all();
        $menu_master = Menu::whereNull('parent_code')->with('children')->orderBy('sequence')->get();
        return view('back.unit_kerja.index', compact('unit_kerja', 'menu_master'));
    }

    public function add()
    {
        return view('back.unit_kerja.formTambah');
    }

    public function prosesTambah(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $unit_kerja = new UnitKerja();
        $unit_kerja->name = $request->name;

        try {
            $unit_kerja->save();
            return redirect()->route('unit_kerja.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('unit_kerja.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $unit_kerja = UnitKerja::findOrFail($id);
        return view('back.unit_kerja.formEdit', compact('unit_kerja'));
    }

    public function prosesEdit(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $unit = UnitKerja::find($request->id);
        $unit->name = $request->name;

        try {
            $unit->save();
            return redirect()->route('unit_kerja.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('unit_kerja.index')->with('error', 'Data gagal diubah');
        }
    }

    public function delete($id)
    {
        $unit = UnitKerja::find($id);
        $unit->delete();
        return redirect()->route('unit_kerja.index')->with('success', 'Data berhasil dihapus');
    }

}
