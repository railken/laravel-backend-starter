<?php

namespace Core\EventLog\Attributes\Id\Exceptions;

use Core\EventLog\Exceptions\EventLogAttributeException;

class EventLogIdNotDefinedException extends EventLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_ID_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
