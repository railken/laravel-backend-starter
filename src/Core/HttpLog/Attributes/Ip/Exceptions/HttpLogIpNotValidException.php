<?php

namespace Core\HttpLog\Attributes\Ip\Exceptions;

use Core\HttpLog\Exceptions\HttpLogAttributeException;

class HttpLogIpNotValidException extends HttpLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'ip';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'HTTPLOG_IP_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}