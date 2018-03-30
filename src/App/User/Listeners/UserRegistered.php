<?php

namespace App\User\Listeners;

use Core\User\User;
use Core\User\Events\UserRegistered as Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class UserRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // ...
    }

    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        $m = new \Core\User\UserManager();
        $users = $m->getRepository()->newQuery()->where('role', '=', 'admin')->get();
        
        Notification::send($users, new \App\User\Notifications\UserRegistered($event->user));
    }
}
