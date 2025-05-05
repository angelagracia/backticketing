<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['name'];

    // Jika SubCategory memiliki relasi dengan LoginRequest
    public function loginRequests()
    {
        return $this->hasMany(LoginRequest::class);
    }
}
