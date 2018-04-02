<?php

namespace Core\Env\Attributes\Key\Exceptions;

use Core\Env\Exceptions\EnvAttributeException;

class EnvKeyNotDefinedException extends EnvAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'key';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ENV_KEY_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
