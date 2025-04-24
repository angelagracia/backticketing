<?php

use App\Models\Ticket;
use App\Models\UserBO;
use App\Models\UserPortal;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat-ticket.{ticketId}', function ($user, $ticketId) {
    $ticket = Ticket::find($ticketId);

    return $ticket && (
        ($user instanceof UserBO && $ticket->admin_id == $user->id) ||
        ($user instanceof UserPortal && $ticket->user_id == $user->id)
    );
});

Broadcast::channel('chat.{ticketId}', function ($user, $ticketId) {
    logger('USER AUTH:', [$user]); // akan tercatat di log
    return true;
});




