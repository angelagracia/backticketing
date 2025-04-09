<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Ticket;

class TicketCreatedNotification extends Notification
{
    use Queueable;

    protected $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Tiket Keluhan Berhasil Dibuat')
            ->greeting('Halo, ' . $this->ticket->name)
            ->line('Tiket keluhan Anda berhasil dibuat.')
            ->line('Nomor Tiket: ' . $this->ticket->ticket_number)
            ->line('Deskripsi: ' . $this->ticket->req_description)
            ->line('Silakan pantau status tiket Anda melalui sistem kami.')
            ->salutation('Terima kasih.');
    }
}
