<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Portal extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'users_portal';
    protected $guard_name = 'Admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Kamu bisa hapus relasi `role()` manual kalau gak pakai role_id secara langsung
    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }

    public function ticket()
    {
        return $this->hasMany(Ticket::class,'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }

    public function hasPermission($permission)
    {
        return $this->roles()->whereHas('permissions', function ($query) use ($permission) {
            $query->where('name', $permission);
        })->exists();
    }
}
