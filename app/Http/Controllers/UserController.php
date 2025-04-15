<?php

// namespace App\Http\Controllers;

// use App\Models\Menu;
// use App\Models\Role;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;

// class UserController extends Controller
// {
//     public function index(Request $request)
// {
//     // Ambil semua user dengan relasi roles
//     $master_users = User::with('roles')->get(); 
//     // dd($master_users);

//     // Ambil semua role dari tabel roles
//     $master_roles = Role::all(); 

//     // Ambil semua menu dari tabel menus
//     $menu_master = Menu::all(); 

//     return view('back.user.index', compact('master_users', 'menu_master', ));
// }

//     public function add()
//     {
//         return view('back.user.add');
//     }

//     public function prosesAdd(Request $request)
//     {
//         // Validate input data
//         $validated = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email',
//             'password' => 'required|string|min:8|confirmed', // This line checks if password matches password_confirmation
//         ]);

//         // Create the user
//         $user = new User();
//         $user->name = $request->name;
//         $user->email = $request->email;
//         $user->password = Hash::make($request->password); // Hash the password
//         $user->save();

//         return redirect()->route('users.index')->with('success', 'User successfully added!');
//     }

//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         return view('back.user.formEdit', compact('user'));
//     }

//     public function prosesEdit(Request $request)
//     {

//     // Validasi input
//     $validated = $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email,' . $request->id, // Cek unik kecuali user saat ini
//         'password' => 'nullable|string|min:8|confirmed', // Password opsional, hanya update jika diisi
//     ]);

//     // Cari user berdasarkan ID
//     $user = User::findOrFail($request->id);

//     // Update data user
//     $user->name = $request->name;
//     $user->email = $request->email;

//     // Jika password diisi, update password
//     if (!empty($request->password)) {
//         $user->password = Hash::make($request->password);
//     }

//     // Simpan perubahan
//     $user->save();

//     // Redirect kembali dengan pesan sukses
//     return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');

//     }

//     public function delete($id)
//     {

//     // Cari user berdasarkan ID
//     $user = User::findOrFail($id);

//     // Hapus user dari database
//     $user->delete();

//     // Redirect kembali dengan pesan sukses
//     return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
//     }

// }




namespace App\Http\Controllers;
    
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $data = User::latest()->paginate(5);
        // $users = User::whereNot('id', Auth::user()->id)->withCount(['unreadMessages'])->get();
        $menu_master = Menu::whereNull('parent_code')
        ->with('subMenu') // pastikan relasi subMenu ada di model Menu
        ->get();

        return view('users.index',compact('data','menu_master'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function chatUser($ticketId)
    {
        return view('user-chat', compact('ticketId'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}