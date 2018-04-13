<?php

namespace Core\Disk\Attributes\Enabled\Exceptions;

use Core\Disk\Exceptions\DiskAttributeException;

class DiskEnabledNotUniqueException extends DiskAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'enabled';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_ENABLED_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}