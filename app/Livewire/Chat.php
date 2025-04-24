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
    public $sender_type;
    public $currentUserName;    
    public $message = '';
    public $messages = [];

    public function render()
    {
        return view('livewire.chat');
    }


    public function mount($ticket_id)
    {
        $this->ticket_id = $ticket_id;
    
        if (auth()->guard('bo')->check()) {
            $user = auth()->guard('bo')->user();
            $this->sender_id = $user->id;
            $this->sender_type = UserBO::class;
            $this->currentUserName = $user->name;
        } elseif (auth()->guard('portal')->check()) {
            $user = auth()->guard('portal')->user();
            $this->sender_id = $user->id;
            $this->sender_type = UserPortal::class;
            $this->currentUserName = $user->name;
        }
        
    
        $this->receiver_id = $ticket_id;
    
        $messages = Message::where('ticket_id', $ticket_id)
            ->with('sender:id,name', 'receiver:id,name')
            ->get();
    
        foreach ($messages as $message) {
            $this->appendChatMessage($message);
        }
    
        $this->user = UserBO::find($ticket_id) ?? UserPortal::find($ticket_id);
    }
    


    

    public function sendMessage(){
        $receiver_type = $this->sender_type === UserBO::class ? UserPortal::class : UserBO::class;
    
        $chatMessage = Message::create([
            'ticket_id' => $this->ticket_id,
            'sender_id' => $this->sender_id,
            'sender_type' => $this->sender_type,
            'receiver_id' => $this->receiver_id,
            'receiver_type' => $receiver_type,
            'message' => $this->message,
        ]);
        
        $this->appendChatMessage($chatMessage);
        
        broadcast(new MessageSendEvent($chatMessage))->toOthers();
    
        $this->message = '';
    }
    

    #[On('echo-private:chat-ticket.{ticket_id},MessageSendEvent')]
    public function listenForMessage($event)
    {
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
