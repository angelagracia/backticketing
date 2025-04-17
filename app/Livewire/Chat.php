<?php

/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */

namespace App\Livewire;

use App\Events\MessageSentEvent;
use App\Events\UnreadMessage;
use App\Events\UserTyping;
use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Chat extends Component
{
    use WithFileUploads;

    public $ticket;
    public $ticketId;
    public $senderId; 
    public $receiverId;
    public $message;
    public $messages = [];
    public $file;

    public function mount($ticketId)
{
    $this->ticketId = $ticketId;
    $this->senderId = Auth::user()->id;
    $ticket = Ticket::findOrFail($ticketId);

    // Cek apakah user saat ini adalah user portal (pengguna biasa)
    if (Auth::guard('portal')->check()) {
        $this->receiverId = $ticket->admin_id ?? 1; // default ke admin ID 1 kalau belum ditugaskan
    } else {
        // berarti ini admin, kirim ke user yang buat tiket
        $this->receiverId = $ticket->user_id;
    }

    // $this->dispatch('echo:subscribe', [
    //     'channel' => 'private-chat-channel.' . $this->senderId,
    //     'events' => ['MessageSentEvent' => 'listenMessage'],
    // ]);
    

    $this->messages = $this->getMessages();
}

    

    public function render()
    {
        # Read Messages
        $this->markMessagesAsRead();

        return view('livewire.chat');
    }


    public function getTicket($ticketId)
    {
        return Ticket::where('id', $ticketId)
            ->when(Auth::guard('portal')->check(), function ($query) {
                $query->where('user_id', Auth::id()); // validasi user portal
            })
            ->firstOrFail();
    }
    
    /**
     * Function: sendMessage
     * @param NA
     * @return
     */
    public function sendMessage()
    {
        if (!$this->message && !$this->file) {
            return;
        }

        $sentMessage = $this->saveMessage()->load('sender:id,name', 'receiver:id,name');

        // Append the new message manually for the sender's side
        $this->messages[] = $sentMessage;

        // Broadcast Sent Message Event
        broadcast(new \App\Events\ChatMessageSent($sentMessage))->toOthers();


        // Clear the message and file input
        $this->message = null;
        $this->file = null;

        // Emit the scroll event (if needed)
        // $this->dispatch('echo:subscribe', [
        //     'channel' => 'private-chat.' . $this->ticketId,
        //     'events' => ['ChatMessageSent' => 'listenMessage'],
        // ]);
        

    }

    #[On("echo-private:chat.{ticketId},ChatMessageSent")]

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
        $filePath = null;
        $fileName = null;
        $fileOriginalName = null;
        $fileType = null;
    
        if ($this->file) {
            $fileOriginalName = $this->file->getClientOriginalName();
            $fileName = $this->file->hashName();
            $filePath = $this->file->store('uploads', 'public');
            $fileType = $this->file->getMimeType();
        }
    
        // Tentukan sender_type berdasarkan guard
        if (auth('bo')->check()) {
            $senderType = 'App\\Models\\UserBo';
        } elseif (auth('portal')->check()) {
            $senderType = 'App\\Models\\UserPortal';
        } else {
            $senderType = null; // optional: bisa juga lempar error
        }
    
        return Message::create([
            'ticket_id' => $this->ticketId,
            'sender_id' => $this->senderId,
            'sender_type' => $senderType, // <-- ini yang penting!
            'receiver_id' => $this->receiverId,
            'message' => $this->message,
            'file_name' => $fileName,
            'file_name_original' => $fileOriginalName,
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);
    }
    
    
    /**
     * Function: getMessages
     * @param
     * @return
     */
    public function getMessages()
    {
        return Message::where('ticket_id', $this->ticketId)
                      ->with('sender:id,name', 'receiver:id,name')
                      ->orderBy('created_at', 'asc')
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