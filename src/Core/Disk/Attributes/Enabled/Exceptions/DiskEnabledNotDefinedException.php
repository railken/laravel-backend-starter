<?php

namespace Core\Disk\Attributes\Enabled\Exceptions;

use Core\Disk\Exceptions\DiskAttributeException;

class DiskEnabledNotDefinedException extends DiskAttributeException
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
    protected $code = 'DISK_ENABLED_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
