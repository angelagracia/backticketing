<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    // // protected $fillable = ['ticket_number','name','email','telepon','status_id','unit_id','unit_kerja_id','topic_id','type_id','title','req_description'];
    // protected $fillable = ['name','title'];
    protected $fillable = [
        'name', 'title', 'email', 'unit_id', 'unit_kerja_id', 'topic_id', 'type_id', 'status_id', 'req_description'
    ];    
    
    protected $guarded = ['id']; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_number = 'TCK-' . strtoupper(Str::random(6));
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function attachments() {
        return $this->hasMany(TicketAttachment::class);
    }

    public function histories()
    {
        return $this->hasMany(TicketHistory::class);
    }
    protected static function booted()
{
    static::updated(function ($ticket) {
        if ($ticket->isDirty('status_id')) {
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_id' => $ticket->status_id,
                'description' => 'Status otomatis tercatat',
            ]);
        }
    });
}




}
