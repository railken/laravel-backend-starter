<?php

namespace Core\Listener;

use Illuminate\Support\ServiceProvider;

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

                	print_r($action->id);

                    /*$target = $event->user;
                    $data = (array)$event;
                    print_r($data);

                    $targets = explode(",", str_replace("{{ \$target->email }}", $target->email, $listener->target));

                    $filename = $this->generateViewFile($listener->content, "mail-listeners-".$listener->id);

                    $mail = new GenericMail();
                    $mail->subject($listener->subject);
                    $mail->view($filename, $data);
                    $mail->to($targets);

                    Mail::to([])->queue($mail);*/
                }
                
        	}
        });
    }

    public function generateViewFile($html, $url)
    {
        $path = Config::get('view.paths.0');

        $view = "cache/".$url."-".hash('sha1', $url);

        $filename = $path."/".$view.".blade.php";

        !file_exists(dirname($filename)) && mkdir(dirname($filename), 0777, true);

        file_put_contents($filename, $html);

        return $view;
    }
}
