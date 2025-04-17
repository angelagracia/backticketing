<?php

use App\Models\Ticket;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.Ticket.{id}', function ($ticket, $id) {
    return (int) $ticket->id === (int) $id;
});

Broadcast::channel('chat-channel.{receiverId}', function (Ticket $ticket, $receiverId) {
    return (int) $ticket->id === (int) $receiverId;
});

Broadcast::channel('unread-channel.{receiverId}', function (Ticket $ticket, $receiverId) {
    return (int) $ticket->id === (int) $receiverId;
});

// Broadcast::channel('chat-channel.{userId}', function ($user, $userId) {
//     return (int) $user->id === (int) $userId;
// });
// Broadcast::channel('private-chat-channel.{userId}', function ($user, $userId) {
//     return (int) $user->id === (int) $userId;
// });
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('chat-channel.{userId}',function(Ticket $user, $userId){
    return (int) $user->id === (int) $userId;
});



