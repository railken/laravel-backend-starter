<?php

namespace Api\Exceptions;

use Exception;
use Illuminate\Support\Collection;
use ArrayAccess;

class BadRequestException extends Exception
{

    /**
     * A list of errors that has been detected during request
     *
     * @var ArrayAccess
     */
    protected $errors;

    /**
     * Construct
     *
     * @param ArrayAccess $errors
     */
    public function __construct(ArrayAccess $errors)
    {
        $this->errors = $errors;

        $this->message = $errors->map(function ($error) {
            return $error->toArray();
        });

        parent::__construct();
    }
}
