<?php

namespace Core\MailListener\Attributes\EventClass\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerEventClassNotDefinedException extends MailListenerAttributeException
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
    protected $code = 'MAILLISTENER_EVENT_CLASS_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
