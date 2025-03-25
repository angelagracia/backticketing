<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HakAkses extends Model
{
    use HasFactory;
    protected $table = 'master_permissions';
    protected $fillable = ['name'];
}
