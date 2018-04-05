<?php

namespace Core\MailListener\Exceptions;

class MailListenerNotAuthorizedException extends MailListenerException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
