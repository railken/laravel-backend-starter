<?php

namespace Core\MailListener\Attributes\EventClass\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerEventClassNotAuthorizedException extends MailListenerAttributeException
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
    protected $code = 'MAILLISTENER_EVENT_CLASS_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
