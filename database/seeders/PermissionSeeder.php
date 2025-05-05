<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Cek atau buat role admin
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['guard_name' => 'bo']);

        // Membuat permissions jika belum ada
        Permission::firstOrCreate(['name' => 'view-role']);
        Permission::firstOrCreate(['name' => 'create-role']);
        Permission::firstOrCreate(['name' => 'edit-role']);
        Permission::firstOrCreate(['name' => 'delete-role']);

        // Memberikan permissions ke role admin
        $adminRole->givePermissionTo(['view-role', 'create-role', 'edit-role', 'delete-role']);

        // Cek apakah user ID 1 ada, jika tidak, buat user baru
        $user = User::find(1);
        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password')
            ]);
        }

        // Memberikan role admin ke user
        $user->assignRole('admin');
    }
}
