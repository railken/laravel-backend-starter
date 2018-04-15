<?php

namespace Core\File\Attributes\Ext\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FileExtNotValidException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'ext';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_EXT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
