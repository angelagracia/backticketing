<?php

namespace Database\Seeders;

use App\Models\Masterpermission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Role
        $admin = Role::create(['name' => 'Administrator']);
        $editor = Role::create(['name' => 'Editor']);

        // Buat Permissions
        $permissions = ['Lihat', 'Tambah', 'Edit', 'Delete'];
        
        foreach ($permissions as $perm) {
            $permission = Masterpermission::create(['name' => $perm]);
            $admin->permissions()->attach($permission); // Beri semua akses ke Admin
        }
        
        $editor->permissions()->attach(Masterpermission::where('name', '!=', 'Delete')->get()); // Editor tidak bisa hapus
    }
}
