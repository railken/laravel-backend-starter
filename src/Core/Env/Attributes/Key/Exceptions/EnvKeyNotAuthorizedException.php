<?php

namespace Core\Env\Attributes\Key\Exceptions;

use Core\Env\Exceptions\EnvAttributeException;

class EnvKeyNotAuthorizedException extends EnvAttributeException
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
    protected $code = 'ENV_KEY_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
