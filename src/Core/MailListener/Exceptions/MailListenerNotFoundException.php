<?php

namespace Core\MailListener\Exceptions;

class MailListenerNotFoundException extends MailListenerException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
