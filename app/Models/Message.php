<?php


/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{

use HasFactory;
protected $table = 'messages';
protected $fillable = [
    'ticket_id',
    'sender_id',
    'sender_type',
    'receiver_id',
    'receiver_type',
    'message',
];
public function sender(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'sender_type', 'sender_id');
    }

    public function receiver(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'receiver_type', 'receiver_id');
    }

}
