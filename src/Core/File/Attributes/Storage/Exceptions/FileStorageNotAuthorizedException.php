<?php

namespace Core\File\Attributes\Storage\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FileStorageNotAuthorizedException extends FileAttributeException
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
    protected $code = 'FILE_STORAGE_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
