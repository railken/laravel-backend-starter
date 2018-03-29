<?php

namespace Core\File\Attributes\Storage\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FileStorageNotUniqueException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'storage';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_STORAGE_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
