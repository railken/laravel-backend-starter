<?php

namespace Core\MailListener\Attributes\Enabled\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerEnabledNotValidException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'enabled';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_ENABLED_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
