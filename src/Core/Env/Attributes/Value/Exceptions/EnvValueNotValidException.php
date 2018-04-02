<?php

namespace Core\Env\Attributes\Value\Exceptions;

use Core\Env\Exceptions\EnvAttributeException;

class EnvValueNotValidException extends EnvAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'value';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ENV_VALUE_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
