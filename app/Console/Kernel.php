<?php

namespace App\Console;

use App\Models\TodoList;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->call(function () {

             $todoLists = TodoList::whereBetween('start_at', [ now(), now()->addMinutes(30) ])->where('status', 0)->where('send_notif', 0)->get();

             foreach ($todoLists as $todoList) {
                 $todoList->update([
                     'send_notif' => 1
                 ]);
                 Log::info('send notif for user: '.$todoList->user_id);
             }

         })->everyMinute()->name('sendNotifForUser')->withoutOverlapping();
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
