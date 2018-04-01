<?php

namespace Core\MailLog\Attributes\Body\Exceptions;

use Core\MailLog\Exceptions\MailLogAttributeException;

class MailLogBodyNotUniqueException extends MailLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'body';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_BODY_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
