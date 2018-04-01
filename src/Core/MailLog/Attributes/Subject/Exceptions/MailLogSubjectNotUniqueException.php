<?php

namespace Core\MailLog\Attributes\Subject\Exceptions;

use Core\MailLog\Exceptions\MailLogAttributeException;

class MailLogSubjectNotUniqueException extends MailLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'subject';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_SUBJECT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
