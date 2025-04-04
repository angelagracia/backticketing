<?php

/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Events\UserTyping;
use Livewire\Attributes\On;
use App\Events\UnreadMessage;
use Livewire\WithFileUploads;
use App\Mail\ChatNotification;
use App\Events\MessageSentEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Chat extends Component
{
    use WithFileUploads;

    public $user;
    public $senderId;
    public $receiverId;
    public $message;
    public $messages = [];
    public $file;

    public function mount($userId)
    {
        $this->dispatch('messages-updated');

        $this->senderId   = Auth::user()->id;
        $this->receiverId = $userId;

        # Get User
        $this->user = $this->getUser($userId);

        # Get Messages
        $this->messages = $this->getMessages();

        # Read Messages
        $this->markMessagesAsRead();
    }

    public function render()
    {
        # Read Messages
        $this->markMessagesAsRead();

        return view('livewire.chat');
    }

    /**
     * Function: getUser
     * @param userId
     * @return App\Models\User
     */
    public function getUser($userId)
    {
        return User::find($userId);
    }

    /**
     * Function: sendMessage
     * @param NA
     * @return
     */
    public function sendMessage()
    {
        if (! $this->message && ! $this->file) {
            return;
        }

        $sentMessage = $this->saveMessage()->load('sender:id,name', 'receiver:id,name');

        // Append the new message manually for the sender's side
        $this->messages[] = $sentMessage;

        // Kirim email notifikasi ke penerima
        if ($this->user && $this->user->email) {
            Mail::to($this->user->email)->send(new ChatNotification($sentMessage));
        }        

        # Broadcast Sent Message Event
        broadcast(new MessageSentEvent($sentMessage))->toOthers();

        # Calculate unread messages for the receiver
        $unreadCount = $this->getUnreadMessagesCount();

        # Broadcast unread message count
        broadcast(new UnreadMessage($this->receiverId, $this->senderId, $unreadCount))->toOthers();

        $this->messages[] = $sentMessage;
        $this->message = null;
        $this->file    = null;

        # Emit the scroll event
        $this->dispatch('messages-updated');
    }

    #[On('echo-private:chat-channel.{senderId},MessageSentEvent')]
    public function listenMessage($event)
    {
        # Convert the event message array into an Eloquent model with relationships
        $newMessage = Message::find($event['message']['id'])->load('sender:id,name', 'receiver:id,name');

        $this->messages[] = $newMessage;
    }

    /**
     * Save Message
     * @return
     */
    public function saveMessage()
    {
        $filePath         = null;
        $fileOriginalName = null;
        $fileName         = null;
        $fileType         = null;

        if ($this->file) {
            $fileOriginalName = $this->file->getClientOriginalName();
            $fileName         = $this->file->hashName();
            $filePath         = $this->file->store('uploads', 'public');
            $fileType         = $this->file->getMimeType();
        }

        return Message::create([
            'message'            => $this->message,
            'sender_id'          => $this->senderId,
            'receiver_id'        => $this->receiverId,
            'file_name'          => $fileName,
            'file_name_original' => $fileOriginalName,
            'file_path'          => $filePath,
            'file_type'          => $fileType,
        ]);
    }

    /**
     * Function: getMessages
     * @param
     * @return
     */
    public function getMessages()
    {
        return Message::with('sender:id,name', 'receiver:id,name')
            ->where(function ($query) {
                $query->where('sender_id', $this->senderId)
                    ->where('receiver_id', $this->receiverId);
            })
            ->orWhere(function ($query) {
                $query->where('sender_id', $this->receiverId)
                    ->where('receiver_id', $this->senderId);
            })
            ->get();
    }

    /**
     * Function: userTyping
     */
    public function userTyping()
    {
        broadcast(new UserTyping($this->senderId, $this->receiverId))->toOthers();
    }

    /**
     * Function: getUnreadMessagesCount
     * @return unreadMessagesCount
     */
    public function getUnreadMessagesCount()
    {
        return Message::where('receiver_id', $this->receiverId)
            ->where('is_read', false)
            ->count();
    }

    /**
     * Function: markMessagesAsRead
     */
    public function markMessagesAsRead()
    {
        Message::where('receiver_id', $this->senderId)
            ->where('sender_id', $this->receiverId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        # Broadcast unread message count
        broadcast(new UnreadMessage($this->senderId, $this->receiverId, 0))->toOthers();
    }

    /**
     * Automatically send file when selected
     */
    public function sendFileMessage()
    {
        if ($this->file) {
            $this->sendMessage();
        }
    }

    
}
