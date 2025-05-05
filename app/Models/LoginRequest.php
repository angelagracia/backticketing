<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Category;

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

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit'); // 'unit' adalah kolom yang ada di tabel login_requests
    }
    
    public function topic()
    {
        return $this->belongsTo(Category::class, 'category'); // Sesuaikan dengan relasi yang benar
    }
    
    // Relasi ke model SubCategory
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category'); // 'sub_category' adalah kolom yang ada di tabel login_requests
    }
}
