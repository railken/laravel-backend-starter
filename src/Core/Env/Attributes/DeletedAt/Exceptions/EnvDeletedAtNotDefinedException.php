<?php

namespace Core\Env\Attributes\DeletedAt\Exceptions;

use Core\Env\Exceptions\EnvAttributeException;

class EnvDeletedAtNotDefinedException extends EnvAttributeException
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
    protected $code = 'ENV_DELETED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
