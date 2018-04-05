<?php

namespace Core\MailListener\Attributes\Target\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerTargetNotUniqueException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'target';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_TARGET_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
