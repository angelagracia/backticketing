<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Tentukan perintah Artisan yang dijadwalkan.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('tickets:auto-close')->everyMinute();
    }
    


    /**
     * Registrasi command aplikasi.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
