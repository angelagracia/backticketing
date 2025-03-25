<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $master_users = User::all();
        $menu_master = Menu::all(); 
        return view('back.user.index', compact('master_users', 'menu_master'));
    }

    public function add()
    {
        return view('back.user.add');
    }

    public function prosesAdd(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // This line checks if password matches password_confirmation
        ]);

        // Create the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();

        return redirect()->route('users.index')->with('success', 'User successfully added!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('back.user.formEdit', compact('user'));
    }

    public function prosesEdit(Request $request)
    {

    // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $request->id, // Cek unik kecuali user saat ini
        'password' => 'nullable|string|min:8|confirmed', // Password opsional, hanya update jika diisi
    ]);

    // Cari user berdasarkan ID
    $user = User::findOrFail($request->id);

    // Update data user
    $user->name = $request->name;
    $user->email = $request->email;

    // Jika password diisi, update password
    if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
    }

    // Simpan perubahan
    $user->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');

    }

    public function delete($id)
    {

    // Cari user berdasarkan ID
    $user = User::findOrFail($id);

    // Hapus user dari database
    $user->delete();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }

}
