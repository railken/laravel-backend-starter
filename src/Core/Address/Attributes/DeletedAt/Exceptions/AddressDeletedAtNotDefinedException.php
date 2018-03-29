<?php

namespace Core\Address\Attributes\DeletedAt\Exceptions;

use Core\Address\Exceptions\AddressAttributeException;

class AddressDeletedAtNotDefinedException extends AddressAttributeException
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
    protected $code = 'ADDRESS_DELETED_AT_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}