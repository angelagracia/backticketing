<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $master_roles = Role::all();
        return view('back.role.index', ['master_roles' => $master_roles]);
    }

    public function add()
    {
        $getPermission = Permission::getRecord();
        dd($getPermission);
        $data['getPermission'] = $getPermission;
        return view('back.role.role-add', $data);
    }
    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'Role berhasil diberikan!');
    }
}
