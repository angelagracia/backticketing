<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('chat-channel.{ticketId}', function ($user, $ticketId) {
    return $user->hasAccessToTicket($ticketId);
});





// Broadcast::channel('chat-channel.{userId}', function ($user, $userId) {
//     $authUser = Auth::guard('bo')->user() ?? Auth::guard('portal')->user();
//     return $authUser && (int) $authUser->id === (int) $userId;
// });




// Broadcast::channel('chat-channel.{userId}',function(User $user, $userId){
//     return (int) $user->id === (int) $userId;
// });