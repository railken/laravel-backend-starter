<?php

namespace Core\Address\Attributes\UpdatedAt\Exceptions;

use Core\Address\Exceptions\AddressAttributeException;

class AddressUpdatedAtNotDefinedException extends AddressAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'ADDRESS_UPDATED_AT_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}
