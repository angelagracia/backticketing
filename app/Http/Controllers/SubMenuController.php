<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubMenuController extends Controller
{
    public function index()
    {
        $menu_master = Menu::whereNull('parent_code')
        ->with(['children.permissions', 'permissions'])
        ->orderBy('sequence')
        ->get();
    
        $data = SubMenu::with('menu')->orderBy('menu_code')->get(); // Menampilkan menu terkait
        return view('back.submenu.index', compact('data','menu_master'));
    }

    public function add()
    {

    $master_sub_menu = Menu::all(); // Ambil semua data kategori
    // Ambil daftar enum dari kolom 'status' pada tabel 'master_menu'
    $type = DB::select("SHOW COLUMNS FROM master_sub_menu WHERE Field = 'status'");
    
    // Parse hasilnya untuk mengambil ENUM values
    preg_match("/^enum\((.*)\)$/", $type[0]->Type, $matches);
    $enumValues = str_getcsv($matches[1], ",", "'");
        return view('back.submenu.add', compact('enumValues','master_sub_menu'));
    }

    public function prosesAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'menu_code' => 'required|exists:master_menu,code',
            'url' => 'required',
            'icon' => 'required',
            'code' => 'required|unique:master_sub_menu,code',
            'status' => 'required|in:Active,Inactive',
        ]);

        $menu = new SubMenu();
        $menu->name = $request->name;
        $menu->menu_code = $request->menu_code;
        $menu->url = $request->url;
        $menu->code = $request->code;
        $menu->icon = $request->icon;
        $menu->status = $request->status;

        try {
            $menu->save();
            return redirect()->route('sub_menu.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('sub_menu.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $submenu = SubMenu::findOrFail($id); // Jika tidak ditemukan, akan 404
        $master_menu = Menu::all(); // Ambil semua menu utama
        $type = DB::select("SHOW COLUMNS FROM master_sub_menu WHERE Field = 'status'");
        
        preg_match("/^enum\((.*)\)$/", $type[0]->Type, $matches);
        $enumValues = str_getcsv($matches[1], ",", "'");

        return view('back.submenu.edit', compact('submenu', 'enumValues', 'master_menu'));
    }

    /**
     * Proses edit submenu
     */
    public function prosesEdit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:master_sub_menu,id',
            'name' => 'required',
            'menu_code' => 'required|exists:master_menu,code',
            'url' => 'required',
            'icon' => 'required',
            'code' => 'required|unique:master_sub_menu,code,' . $request->id, // Unik, kecuali untuk dirinya sendiri
            'status' => 'required|in:Active,Inactive',
        ]);

        $submenu = SubMenu::findOrFail($request->id);
        $submenu->name = $request->name;
        $submenu->menu_code = $request->menu_code;
        $submenu->url = $request->url;
        $submenu->icon = $request->icon;
        $submenu->code = $request->code;
        $submenu->status = $request->status;

        try {
            $submenu->save();
            return redirect()->route('sub_menu.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('sub_menu.index')->with('error', 'Data gagal diubah: ' . $e->getMessage());
        }
    }

    /**
     * Hapus submenu
     */
    public function delete($id)
    {
        $submenu = SubMenu::findOrFail($id);

        try {
            $submenu->delete();
            return redirect()->route('sub_menu.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('sub_menu.index')->with('error', 'Data gagal dihapus: ' . $e->getMessage());
        }
    }
    
}
