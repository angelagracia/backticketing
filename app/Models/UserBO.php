<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserBo extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $guard_name = 'bo';
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class); // Pastikan relasi ini sesuai dengan hubungan antara UserBO dan Ticket
    }

    // Di BoUser
    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver');
    }

}



