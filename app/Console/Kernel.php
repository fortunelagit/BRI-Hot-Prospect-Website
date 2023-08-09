<?php

namespace App\Console;

use App\Models\Permission;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')->hourly();
        
        $schedule->command('permit:change', ['add_prospect', 0])->timezone('Asia/Jakarta')->monthlyOn(15, '00:00');
        $schedule->command('permit:change', ['edit_prospect', 0])->timezone('Asia/Jakarta')->monthlyOn(25, '00:00');
        $schedule->command('permit:change', ['add_prospect', 1])->timezone('Asia/Jakarta')->monthly();
        $schedule->command('permit:change', ['edit_prospect', 1])->timezone('Asia/Jakarta')->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
