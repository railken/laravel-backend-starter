<?php

namespace Core\Env\Exceptions;

class EnvNotFoundException extends EnvException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ENV_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
