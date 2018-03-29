<?php

namespace Core\File\Attributes\Path\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FilePathNotUniqueException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'path';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_PATH_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}