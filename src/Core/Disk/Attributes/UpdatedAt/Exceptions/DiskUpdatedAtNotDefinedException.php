<?php

namespace Core\Disk\Attributes\UpdatedAt\Exceptions;

use Core\Disk\Exceptions\DiskAttributeException;

class DiskUpdatedAtNotDefinedException extends DiskAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_UPDATED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
