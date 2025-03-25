<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    }
}
