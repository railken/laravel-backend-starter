<?php

namespace Core\Env\Attributes\CreatedAt\Exceptions;

use Core\Env\Exceptions\EnvAttributeException;

class EnvCreatedAtNotDefinedException extends EnvAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ENV_CREATED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
