<?php

namespace Core\Disk\Attributes\Config\Exceptions;

use Core\Disk\Exceptions\DiskAttributeException;

class DiskConfigNotUniqueException extends DiskAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'config';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_CONFIG_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}