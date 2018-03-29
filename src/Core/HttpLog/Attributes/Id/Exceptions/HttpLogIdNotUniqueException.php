<?php

namespace Core\HttpLog\Attributes\Id\Exceptions;

use Core\HttpLog\Exceptions\HttpLogAttributeException;

class HttpLogIdNotUniqueException extends HttpLogAttributeException
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
    protected $code = 'HTTPLOG_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
