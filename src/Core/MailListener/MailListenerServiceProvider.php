<?php

namespace Core\MailListener;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class MailListenerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        MailListener::observe(MailListenerObserver::class);

        $manager = new \Core\MailListener\MailListenerManager();
        Event::listen('*', function($event) {

        	$listeners = $manager->getRepository()->findByEvenClass($event);

        	foreach ($listeners as $listener) {
        		echo "Something has happened....";
        	}
        });
    }
}
