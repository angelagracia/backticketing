<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $table = 'master_topic_type';
    protected $fillable = ['name', 'topic_id'];
    

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class,'id');
    }
}
