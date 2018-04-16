<?php

namespace Core\EventLog\Attributes\DeletedAt\Exceptions;

use Core\EventLog\Exceptions\EventLogAttributeException;

class EventLogDeletedAtNotDefinedException extends EventLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_DELETED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}