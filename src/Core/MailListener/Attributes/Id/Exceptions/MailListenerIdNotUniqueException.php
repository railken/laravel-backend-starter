<?php

namespace Core\MailListener\Attributes\Id\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerIdNotUniqueException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}