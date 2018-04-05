<?php

namespace Core\MailLog\Attributes\DeletedAt\Exceptions;

use Core\MailLog\Exceptions\MailLogAttributeException;

class MailLogDeletedAtNotDefinedException extends MailLogAttributeException
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
    protected $code = 'MAILLOG_DELETED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}