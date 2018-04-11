<?php

namespace Core\Disk\Attributes\Config\Exceptions;

use Core\Disk\Exceptions\DiskAttributeException;

class DiskConfigNotAuthorizedException extends DiskAttributeException
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
    protected $code = 'DISK_CONFIG_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
