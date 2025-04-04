<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required',
            'message' => 'required'
        ]);

        $message = Message::create([
            'ticket_id' => $request->ticket_id,
            'user_id' => Auth::id(),
            'content' => $request->message,
        ]);

        broadcast(new ChatMessageSent($message))->toOthers();

        return response()->json(['message' => $message]);
    }
}
