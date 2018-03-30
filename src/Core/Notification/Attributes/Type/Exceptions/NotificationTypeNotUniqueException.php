<?php

namespace Core\Notification\Attributes\Type\Exceptions;

use Core\Notification\Exceptions\NotificationAttributeException;

class NotificationTypeNotUniqueException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'type';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_TYPE_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}