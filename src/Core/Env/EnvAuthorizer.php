<?php

namespace Core\Env;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class EnvAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'env.create',
        Tokens::PERMISSION_UPDATE => 'env.update',
        Tokens::PERMISSION_SHOW   => 'env.show',
        Tokens::PERMISSION_REMOVE => 'env.remove',
    ];
}
