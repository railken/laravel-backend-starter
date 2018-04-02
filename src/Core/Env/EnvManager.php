<?php

namespace Core\Env;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class EnvManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class, 
        Attributes\CreatedAt\CreatedAtAttribute::class, 
        Attributes\UpdatedAt\UpdatedAtAttribute::class, 
        Attributes\Key\KeyAttribute::class, 
        Attributes\Value\ValueAttribute::class
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\EnvNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new EnvRepository($this));
        $this->setSerializer(new EnvSerializer($this));
        $this->setValidator(new EnvValidator($this));
        $this->setAuthorizer(new EnvAuthorizer($this));

        parent::__construct($agent);
    }
}
