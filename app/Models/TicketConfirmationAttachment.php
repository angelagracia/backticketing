<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketConfirmationAttachment extends Model
{
    protected $fillable = ['ticket_confirmation_id', 'file_path'];

    public function confirmation()
    {
        return $this->belongsTo(TicketConfirmation::class, 'ticket_confirmation_id');
    }
}
