<?php

namespace Core\MailListener\Attributes\DeletedAt\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerDeletedAtNotUniqueException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_DELETED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
