<?php

namespace Core\Config\Attributes\Key\Exceptions;

use Core\Config\Exceptions\ConfigAttributeException;

class ConfigKeyNotUniqueException extends ConfigAttributeException
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
    protected $code = 'CONFIG_KEY_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
