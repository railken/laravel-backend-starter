<?php

namespace Core\MailLog\Attributes\To\Exceptions;

use Core\MailLog\Exceptions\MailLogAttributeException;

class MailLogToNotUniqueException extends MailLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'to';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_TO_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}