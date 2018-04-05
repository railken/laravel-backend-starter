<?php

namespace Core\MailListener\Attributes\Subject\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerSubjectNotValidException extends MailListenerAttributeException
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
    protected $code = 'MAILLISTENER_SUBJECT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
