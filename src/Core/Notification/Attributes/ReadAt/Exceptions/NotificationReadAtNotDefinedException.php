<?php

namespace Core\Notification\Attributes\ReadAt\Exceptions;

use Core\Notification\Exceptions\NotificationAttributeException;

class NotificationReadAtNotDefinedException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'read_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_READ_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}