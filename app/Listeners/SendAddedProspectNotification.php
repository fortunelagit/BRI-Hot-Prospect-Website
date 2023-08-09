<?php

namespace App\Listeners;

use App\Notifications\ProspectAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;


class SendAddedProspectNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $branch = Auth::user()->branch;
        $userlv4 = User::where('role_id', 4)->where('branch', $branch)->get();
        $uker = Auth::user()->uker;
        $userlv3 = User::where('role_id', 3)->where('uker', $uker)->get();

        /* $admins = User::whereHas('roles', function ($query) {
                $query->where('id', 1);
            })->get(); */

        Notification::send($userlv3, new ProspectAdded($event->user));
        Notification::send($userlv4, new ProspectAdded($event->user));
    }
}
