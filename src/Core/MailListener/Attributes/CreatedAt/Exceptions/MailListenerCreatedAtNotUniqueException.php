<?php

namespace Core\MailListener\Attributes\CreatedAt\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerCreatedAtNotUniqueException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_CREATED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
