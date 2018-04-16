<?php

namespace Core\EventLog\Attributes\EventClass\Exceptions;

use Core\EventLog\Exceptions\EventLogAttributeException;

class EventLogEventClassNotDefinedException extends EventLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'event_class';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_EVENT_CLASS_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}