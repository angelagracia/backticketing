<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class MenuAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat menu utama
        $dashboard = Menu::create(['name' => 'Dashboard']);
        $userManagement = Menu::create(['name' => 'User Management']);
        
        // Submenu
        $users = Menu::create(['name' => 'Users', 'code' => $userManagement->id]);
        $roles = Menu::create(['name' => 'Roles', 'code' => $userManagement->id]);
        
        // Permissions untuk setiap submenu
        $permissions = ['view', 'create', 'edit', 'delete'];
        $menus = Menu::whereNotNull('code')->get(); // Ambil hanya submenu

        foreach ($menus as $menu) {
            foreach ($permissions as $perm) {
                Permission::create(['name' => "{$perm} {$menu->name}"]);
            }
        }
    }
}
