<?php

namespace Action\Notification\Attributes\Description\Exceptions;

use Action\Notification\Exceptions\NotificationAttributeException;

class NotificationDescriptionNotDefinedException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'description';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_DESCRIPTION_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
