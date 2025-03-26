<?php

namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        $user = User::create([
            'name' => 'Hardik Savani', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        // Buat role Admin
        $role = Role::create(['name' => 'Admin']);
         
        // Ambil semua permission
        $permissions = Permission::pluck('name')->all(); 

        // Berikan semua permission ke role Admin
        $role->syncPermissions($permissions);
         
        // Assign role Admin ke user
        $user->assignRole('Admin'); 
    }
}
