<?php

namespace Core\MailLog\Attributes\Sent\Exceptions;

use Core\MailLog\Exceptions\MailLogAttributeException;

class MailLogSentNotUniqueException extends MailLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'sent';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_SENT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}