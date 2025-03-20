<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'master_unit_kerja';

    public function peran()
    {
        return $this->hasMany(Unit::class, 'unit_kerja_id', 'id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class,'id');
    }
}
