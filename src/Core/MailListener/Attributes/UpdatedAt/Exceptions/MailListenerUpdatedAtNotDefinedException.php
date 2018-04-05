<?php

namespace Core\MailListener\Attributes\UpdatedAt\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerUpdatedAtNotDefinedException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_UPDATED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
