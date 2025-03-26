<?php

namespace Database\Seeders;

use App\Models\Masterpermission;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder {
    public function run() {
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $user = Role::create(['name' => 'user']);

        $permissions = ['view', 'create', 'edit', 'delete'];

        foreach ($permissions as $perm) {
            $p = Masterpermission::create(['name' => $perm]);
            $admin->permissions()->attach($p);
        }

        $manager->permissions()->attach(Masterpermission::whereIn('name', ['view', 'edit'])->get());
        $user->permissions()->attach(Masterpermission::where('name', 'view')->first());
    }
}
