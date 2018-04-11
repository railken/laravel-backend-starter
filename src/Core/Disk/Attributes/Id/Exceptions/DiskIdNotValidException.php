<?php

namespace Core\Disk\Attributes\Id\Exceptions;

use Core\Disk\Exceptions\DiskAttributeException;

class DiskIdNotValidException extends DiskAttributeException
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
    protected $code = 'DISK_ID_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
