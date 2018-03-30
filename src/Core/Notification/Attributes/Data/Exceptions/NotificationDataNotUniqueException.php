<?php

namespace Core\Notification\Attributes\Data\Exceptions;

use Core\Notification\Exceptions\NotificationAttributeException;

class NotificationDataNotUniqueException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'data';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_DATA_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
