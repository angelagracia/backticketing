<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'master_topic';
    protected $fillable = ['name'];
    protected $primaryKey = 'id';

    public function subCategories()
    {
        return $this->hasMany(Type::class,'id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class,'id');
    }
}


