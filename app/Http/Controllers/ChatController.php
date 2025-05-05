

<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Laravel\Reverb\Events\MessageSent;

// use App\Events\ChatMessageSent;
// use App\Models\Message;

// class ChatController extends Controller
// {
//     public function sendMessage(Request $request)
//     {
//         $user = Auth::user(); // Mendapatkan user yang mengirim pesan

//         // Validasi pesan
//         $request->validate([
//             'message' => 'required|string',
//         ]);

//         // Kirim event ke channel
//         broadcast(new MessageSent($request->message, $user));

//         return response()->json(['status' => 'Message sent']);

//         $request->validate([
//             'ticket_id' => 'required',
//             'message' => 'required'
//         ]);

//         $message = Message::create([
//             'ticket_id' => $request->ticket_id,
//             'user_id' => Auth::id(),
//             'content' => $request->message,
//         ]);

//         broadcast(new ChatMessageSent($message))->toOthers();

//         return response()->json(['message' => $message]);
//     }
// }





use App\Models\Message;
use Illuminate\Http\Request;

use App\Events\ChatMessageSent;
use App\Events\MessageSendEvent;
use App\Events\MessageSentEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // public function sendMessage(Request $request)
    // {
    //     $ticket = Auth::Ticket();

    //     // Validasi input
    //     $request->validate([
    //         'receiver_id' => 'required|exists:tickets,id',
    //         'message' => 'required|string',
    //     ]);
        
    //     // Simpan pesan ke database
    //     $message = Message::create([
    //         'ticket_Id' => $request->ticket_id,
    //         'sender_id' => $ticket->id,
    //         'receiver_id' => $request->receiver_id,
    //          'content' => $request->message,
    //         'message' => $request->message,
    //     ]);

    //     // Kirim event realtime
    //     broadcast(new ChatMessageSent($message))->toOthers();

    //     return response()->json(['message' => $message]);
    // }


    public function sendMessage(Request $request)
{
    $user = auth('bo')->check() ? auth('bo')->user() : auth('portal')->user();
 // atau 'portal' tergantung login

    $request->validate([
        'receiver_id' => 'required|exists:users,id', // atau user_portals
        'ticket_id' => 'required|exists:tickets,id',
        'message' => 'required|string',
    ]);

    $message = Message::create([
        'ticket_id' => $request->ticket_id,
        'sender_id' => $user->id,
        'receiver_id' => $request->receiver_id,
        'message' => $request->message,
    ]);

    broadcast(new MessageSendEvent($message))->toOthers();

    return response()->json(['message' => $message]);
}

}