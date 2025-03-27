<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginRequest extends Model
{
    use HasFactory;

    protected $table = 'login_requests'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'nama',
        'judul',
        'email',
        'unit_kerja',
        'deskripsi',
        'no_telepon',
        'unit',
        'category',
        'sub_category',
        'lampiran',
    ];
}
