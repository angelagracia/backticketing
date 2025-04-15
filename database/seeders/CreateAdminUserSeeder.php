<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserBo;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin back office
        $user = UserBo::create([
            'name' => 'Admin BO', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        // Buat role Admin dengan guard bo
        $role = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'bo']);

        // Ambil semua permission dengan guard bo
        $permissions = Permission::where('guard_name', 'bo')->pluck('name')->all(); 

        // Berikan semua permission ke role
        $role->syncPermissions($permissions);
         
        // Assign role ke user
        $user->assignRole($role);
    }
}
