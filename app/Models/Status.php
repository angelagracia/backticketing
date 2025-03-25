<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'master_status';
    protected $fillable = ['master_status'];
    protected $primaryKey = 'id';

    public function ticket()
    {
        return $this->hasMany(Ticket::class,'id');
    }

    public function histories()
    {
        return $this->hasMany(TicketHistory::class);
    }

    
}
