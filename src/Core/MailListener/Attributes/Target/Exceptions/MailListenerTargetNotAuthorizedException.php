<?php

namespace Core\MailListener\Attributes\Target\Exceptions;

use Core\MailListener\Exceptions\MailListenerAttributeException;

class MailListenerTargetNotAuthorizedException extends MailListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'target';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLISTENER_TARGET_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
