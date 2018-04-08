<?php

namespace Core\Listener;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class ListenerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Listener::observe(ListenerObserver::class);

        
        Event::listen('Core*', function($event_name, $events) {

        	$manager = new \Core\Listener\ListenerManager();

        	$listeners = $manager->getRepository()->findByEventClass($event_name);

        	foreach ($listeners as $listener) {

                foreach ($events as $event) {
                	$action = $listener->action;

                	$action->resolve($event);
                }
                
        	}
        });
    }

}
