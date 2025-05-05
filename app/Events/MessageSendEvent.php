<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class MessageSendEvent implements ShouldBroadcast

{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ticket_id;
    public $message;
    public $sender_id;

    public function __construct($ticket_id, $message, $sender_id)
    {
        $this->ticket_id = $ticket_id;
        $this->message = $message;
        $this->sender_id = $sender_id;
    }

    public function broadcastOn()
    {
        return new Channel('ticket.' . $this->ticket_id);
    }
}
