<?php

namespace Action\Email\Attributes\Name\Exceptions;

use Action\Email\Exceptions\EmailAttributeException;

class EmailNameNotUniqueException extends EmailAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_NAME_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
