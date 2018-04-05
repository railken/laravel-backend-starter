<?php

namespace Core\MailListener;

use Railken\Laravel\Manager\ModelRepository;

class MailListenerRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = MailListener::class;

    /**
     * Find a listener given a event_class
     *
     * @param string $event_class
     *
     * @return \Illuminate\Support\Collection
     */
    public function findByEventClass($event_class)
    {
    	return $this->newQuery()->where('event_class', $event_class)->get();
    }
}
