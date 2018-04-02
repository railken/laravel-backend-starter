<?php

namespace Core\Env\Exceptions;

class EnvNotAuthorizedException extends EnvException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ENV_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
