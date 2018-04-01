<?php

namespace Core\MailLog\Attributes\Id\Exceptions;

use Core\MailLog\Exceptions\MailLogAttributeException;

class MailLogIdNotUniqueException extends MailLogAttributeException
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
    protected $code = 'MAILLOG_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
