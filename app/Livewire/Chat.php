<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserBO;
use App\Models\Message;
use Livewire\Component;
use App\Models\UserPortal;
use Livewire\Attributes\On;
use App\Events\MessageSendEvent;

class Chat extends Component
{

    public $user;
    public $ticket_id;
    public $sender_id;
    public $receiver_id;
    public $message = '';
    public $messages = [];

    public function render()
    {
        return view('livewire.chat');
    }


    public function mount($ticket_id, $user_id)
{
    if (auth('bo')->check()) {
        $this->sender_id = auth('bo')->user()->id;
    } elseif (auth('portal')->check()) {
        $this->sender_id = auth('portal')->user()->id;
    } else {
        abort(403, 'Unauthorized');
    }

    $this->receiver_id = $user_id;  // Pastikan receiver_id diisi dengan benar
    $this->ticket_id = $ticket_id;

    // Ambil pesan sebelumnya berdasarkan sender_id dan receiver_id
    $messages = Message::where(function ($query) {
        $query->where('sender_id', $this->sender_id)
              ->where('receiver_id', $this->receiver_id);
    })->orWhere(function ($query) {
        $query->where('sender_id', $this->receiver_id)
              ->where('receiver_id', $this->sender_id);
    })
    ->with('sender:id,name', 'receiver:id,name')
    ->get();

    foreach ($messages as $message) {
        $this->appendChatMessage($message);
    }
}


    

    

    public function sendMessage(){
        $chatMessage = new Message();
        $chatMessage->sender_id = $this->sender_id;
        $chatMessage->receiver_id = $this->receiver_id;
        $chatMessage->ticket_id = $this->ticket_id;
        $chatMessage->message = $this->message;
        $chatMessage->save();

        $this->appendChatMessage($chatMessage);
        
        broadcast(new MessageSendEvent($chatMessage))->toOthers();

        $this->message = '';

    }

    public function getListeners()
    {
        return [
            "echo-private:chat-channel.{$this->ticket_id},MessageSendEvent" => 'listenForMessage',
        ];
    }

    public function listenForMessage($event){
        $chatMessage = Message::whereId($event['message']['id'])
            ->with('sender:id,name', 'receiver:id,name')
            ->first();

        $this->appendChatMessage($chatMessage);
    }

    public function appendChatMessage($message)
    {
        $sender = $message->sender ?? UserBO::find($message->sender_id) ?? UserPortal::find($message->sender_id);
        $receiver = $message->receiver ?? UserBO::find($message->receiver_id) ?? UserPortal::find($message->receiver_id);
    
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $sender?->name,
            'receiver' => $receiver?->name,
        ];
    }
    
    
}