<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['name'];

    // Jika Category memiliki relasi dengan LoginRequest
    public function loginRequests()
    {
        return $this->hasMany(LoginRequest::class);
    }
}
