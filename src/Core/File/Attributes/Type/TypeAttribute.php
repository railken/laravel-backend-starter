<?php

namespace Core\File\Attributes\Type;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Traits\AttributeValidateTrait;
use Core\File\Attributes\Type\Exceptions as Exceptions;
use Respect\Validation\Validator as v;
use Railken\Laravel\Manager\Tokens;

class TypeAttribute extends BaseAttribute
{

    /**
     * Name attribute
     *
     * @var string
     */
    protected $name = 'type';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model
     *
     * @var boolean
     */
    protected $required = false;

    /**
     * Is the attribute unique
     *
     * @var boolean
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED => Exceptions\FileTypeNotDefinedException::class,
        Tokens::NOT_VALID => Exceptions\FileTypeNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\FileTypeNotAuthorizedException::class
    ];

    /**
     * List of all permissions
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'file.attributes.type.fill',
        Tokens::PERMISSION_SHOW => 'file.attributes.type.show'
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed $value
     *
     * @return boolean
     */
    public function valid(EntityContract $entity, $value)
    {
        return v::length(1, 255)->validate($value);
    }
}
