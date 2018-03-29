<?php

namespace Core\File\Attributes\Status\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FileStatusNotDefinedException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'status';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_STATUS_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}
