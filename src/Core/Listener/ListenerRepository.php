<?php

namespace Core\Listener;

use Railken\Laravel\Manager\ModelRepository;

class ListenerRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Listener::class;
}
