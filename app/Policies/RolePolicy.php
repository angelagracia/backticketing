<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the role.
     */
    public function update(User $user, Role $role)
    {
        // Cek apakah user memiliki hak akses untuk update
        // Misalnya, user dengan ID 1 tidak bisa melakukan update role
        return $user->id !== 1; // User dengan ID 1 tidak bisa update role
    }

    /**
     * Determine whether the user can delete the role.
     */
    public function delete(User $user, Role $role)
    {
        // Cek apakah user memiliki hak akses untuk delete
        // Misalnya, user dengan ID 1 tidak bisa menghapus role
        return $user->id !== 1; // User dengan ID 1 tidak bisa delete role
    }
}

