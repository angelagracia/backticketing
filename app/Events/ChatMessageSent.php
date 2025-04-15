<?php

// namespace App\Events;

// use App\Models\Message;
// use Illuminate\Broadcasting\Channel;
// use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Broadcasting\PresenceChannel;
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
// use Illuminate\Queue\SerializesModels;

// class ChatMessageSent implements ShouldBroadcast
// {
//     use InteractsWithSockets, SerializesModels;

//     public $message;

//     public function __construct(Message $message)
//     {
//         $this->message = $message;
//     }

//     public function broadcastOn()
//     {
//         return new PrivateChannel('chat.' . $this->message->ticket_id);
//     }

//     public function broadcastWith()
//     {
//         return [
//             'message' => $this->message->content,
//             'user' => $this->message->user->name,
//             'created_at' => $this->message->created_at->toDateTimeString(),
//         ];
//     }

//     public function broadcastAs()
//     {
//         return 'ChatMessageSent';
//     }

// }


namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class ChatMessageSent implements ShouldBroadcast
{
    use SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @param Message $message
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message->load('user'); // Eager load the user
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->message->ticketId);
    }

    /**
     * The data that should be broadcast with the event.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'message' => $this->message->content,
            'user' => $this->message->user->name,
            'created_at' => $this->message->created_at->toDateTimeString(),
        ];
    }

    /**
     * The name of the event to be broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'ChatMessageSent';
    }
}
