<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;  // Variabel untuk menyimpan tiket yang ditambahkan

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tiket Baru Ditambahkan')
                    ->view('emails.ticket_added');  // Menggunakan view untuk konten email
    }
}
