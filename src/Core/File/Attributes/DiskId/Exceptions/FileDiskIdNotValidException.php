<?php

namespace Core\File\Attributes\DiskId\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FileDiskIdNotValidException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'disk_id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_DISK_ID_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
