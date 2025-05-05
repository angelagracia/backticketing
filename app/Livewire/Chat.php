<?php

namespace App\Livewire;

use App\Models\Ticket;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use App\Events\MessageSendEvent;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    use WithPagination;

    public $ticket_id;
    public $message;
    public $sender_id;
    public $receiver_id;
    public $sender_type;

    protected $listeners = ['messageReceived' => 'loadMessages'];

    public function mount($ticket_id)
    {
        $this->ticket_id = $ticket_id;
        $ticket = Ticket::findOrFail($ticket_id);
    
        if (auth('bo')->check()) {
            // Admin login → pengirim = admin, penerima = user portal
            $this->sender_id = auth('bo')->id();
            $this->receiver_id = $ticket->user_portal_id;
        } elseif (auth('portal')->check()) {
            // User portal login → pengirim = user portal, penerima = admin
            $this->sender_id = auth('portal')->id();
            $this->receiver_id = $ticket->user_id;
        }
    }
    


    public function loadMessages()
    {
        $this->message = Message::where('ticket_id', $this->ticket_id)
        ->orderBy('created_at', 'asc')
        ->get();
    }

    public function sendMessage()
    {
        // Validasi pesan
        $this->validate([
            'message' => 'required|string|max:255',
        ]);

        $senderType = auth('bo')->check() ? 'bo' : 'portal';
        $body = $this->message;

        // Kirim pesan
        Message::create([
            'ticket_id' => $this->ticket_id,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'message' => $this->message,
            'sender_type' => $senderType,
        ]);

        $this->message = '';

        broadcast(new MessageSendEvent($this->ticket_id, $body, $this->sender_id))->toOthers();        
        $this->emit('messageReceived');
    }

    public function render()
    {
        return view('livewire.chat', [
            'messages' => Message::where('ticket_id', $this->ticket_id)->orderBy('created_at')->get(),
        ]);
    }
}