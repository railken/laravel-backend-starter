<?php

namespace Core\EventLog;

use Railken\Laravel\Manager\ModelRepository;

class EventLogRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = EventLog::class;
}