<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use Carbon\Carbon;

class CloseOldTickets extends Command
{
    protected $signature = 'tickets:auto-close';
    protected $description = 'Menutup tiket yang masih Open atau Process setelah 3 hari';

    public function handle()
    {
        $threeDaysAgo = Carbon::now()->subDays(3); // Hitung 3 hari lalu

        // Menutup tiket yang belum Closed
        $updated = Ticket::whereIn('status_id', [1, 2]) // Open atau Process
                        ->where('created_at', '<=', $threeDaysAgo)
                        ->update(['status_id' => 3]); // Ubah jadi Closed

        if ($updated) {
            $this->info("Berhasil menutup $updated tiket.");
        } else {
            $this->info("Tidak ada tiket yang perlu ditutup.");
        }
    }
}
