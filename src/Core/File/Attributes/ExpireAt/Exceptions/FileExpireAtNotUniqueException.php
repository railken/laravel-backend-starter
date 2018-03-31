<?php

namespace Core\File\Attributes\ExpireAt\Exceptions;

use Core\File\Exceptions\FileAttributeException;

class FileExpireAtNotUniqueException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'expire_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_EXPIRE_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
