<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;
use App\Events\ChatMessageSent;
use Illuminate\Support\Facades\Auth;
use Laravel\Reverb\Events\MessageSent;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = Auth::user(); // Mendapatkan user yang mengirim pesan
        
        // Validasi pesan
        $request->validate([
            'message' => 'required|string',
        ]);

        // Kirim event ke channel
        broadcast(new MessageSent($request->message, $user));

        return response()->json(['status' => 'Message sent']);

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
