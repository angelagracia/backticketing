<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Portal;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PortalController extends Controller
{
    public function index(Request $request): View
    {

        $data = Portal::latest()->paginate(5);
        // $users = User::whereNot('id', Auth::user()->id)->withCount(['unreadMessages'])->get();
        $menu_master = Menu::whereNull('parent_code')
        ->with('subMenu') // pastikan relasi subMenu ada di model Menu
        ->get();
        return view('back.portal.index',compact('data','menu_master'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function add()
    {
        $roles = Role::pluck('name','name')->all();
        return view('back.portal.create',compact('roles'));
    }

    public function prosesAdd(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = Portal::create($input);
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
    public function detail($portalrole)
    {
        $portal = Portal::role($portalrole)->first();
    
        if (!$portal) {
            return redirect()->back()->with('error', 'Portal tidak ditemukan.');
        }
    
        return view('back.portal.show', compact('portal'));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = Portal::findOrFail($id); // lempar 404 kalau tidak ketemu
    
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
    
        return view('back.portal.edit', compact('user', 'roles', 'userRole'));
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
    
        $user = Portal::find($id);
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
        Portal::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

}

