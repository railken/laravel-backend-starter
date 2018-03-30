<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'Core\User\Events\UserRequestConfirmEmail' => [
            'Emails\Listeners\UserSendConfirmationEmail'
        ],
        'Core\User\Events\UserRegistered' => [
            'App\User\Listeners\UserRegistered'
        ]
    ];

   public function boot()
    {
        parent::boot();

        Event::listen('eloquent.*', function($eventName) {

            // print_r($eventName."\n");
            // if(!starts_with($eventName, "illuminate.log")) {
                // \Log::info("Event fired: " . $eventName . "\n");
            // }
        });
    }
}
