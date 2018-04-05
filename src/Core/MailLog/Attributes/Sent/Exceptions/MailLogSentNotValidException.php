<?php

namespace Core\MailLog\Attributes\Sent\Exceptions;

use Core\MailLog\Exceptions\MailLogAttributeException;

class MailLogSentNotValidException extends MailLogAttributeException
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
    protected $code = 'MAILLOG_SENT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}