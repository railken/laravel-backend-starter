<?php

namespace Action\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification as IlluminateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class BaseNotification extends IlluminateNotification implements ShouldQueue
{
    use Queueable;

    public $event;

    /**
     * Create a new event instance.
     *
     * @param  event  $event
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->event->class = get_class($event);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        return [
            'event' => $this->event,
        ];
    }
}
