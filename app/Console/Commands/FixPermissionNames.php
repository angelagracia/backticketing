<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class FixPermissionNames extends Command
{
    protected $signature = 'permissions:fix-role-names';
    protected $description = 'Mengganti nama permission dari peran-* ke role-*';

    public function handle(): int
    {
        $permissions = Permission::where('name', 'like', 'peran-%')->get();

        if ($permissions->isEmpty()) {
            $this->info('Tidak ada permission dengan prefix "peran-".');
            return Command::SUCCESS;
        }

        foreach ($permissions as $permission) {
            $oldName = $permission->name;
            $newName = str_replace('peran-', 'role-', $oldName);

            // Cek apakah sudah ada permission dengan nama yang dituju
            $exists = Permission::where('name', $newName)
                        ->where('guard_name', $permission->guard_name)
                        ->exists();

            if ($exists) {
                $this->warn("Lewati: {$newName} sudah ada.");
                continue;
            }

            $permission->name = $newName;
            $permission->save();

            $this->info("Updated: {$oldName} → {$newName}");
        }

        $this->info("Semua nama permission berhasil diperbarui.");
        return Command::SUCCESS;
    }
}
