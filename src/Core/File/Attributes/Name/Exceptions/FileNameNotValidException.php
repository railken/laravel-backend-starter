<?php

namespace Core\File\Attributes\Name\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FileNameNotValidException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_NAME_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}