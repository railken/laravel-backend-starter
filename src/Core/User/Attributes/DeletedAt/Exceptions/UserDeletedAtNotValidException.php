<?php

namespace Core\User\Attributes\DeletedAt\Exceptions;

use Core\User\Exceptions\UserAttributeException;

class UserDeletedAtNotValidException extends UserAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'USER_DELETED_AT_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}