<?php

namespace Core\MailListener\Attributes\Content\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerContentNotValidException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'content';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_CONTENT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}