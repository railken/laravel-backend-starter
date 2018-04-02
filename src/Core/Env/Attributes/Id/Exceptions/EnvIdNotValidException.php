<?php

namespace Core\Env\Attributes\Id\Exceptions;

use Core\Env\Exceptions\EnvAttributeException;

class EnvIdNotValidException extends EnvAttributeException
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
    protected $code = 'ENV_ID_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
