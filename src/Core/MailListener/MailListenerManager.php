<?php

namespace Core\MailListener;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class MailListenerManager extends ModelManager
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
        Attributes\Target\TargetAttribute::class, 
        Attributes\Content\ContentAttribute::class, 
        Attributes\Enabled\EnabledAttribute::class, 
        Attributes\EventClass\EventClassAttribute::class
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\MailListenerNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new MailListenerRepository($this));
        $this->setSerializer(new MailListenerSerializer($this));
        $this->setValidator(new MailListenerValidator($this));
        $this->setAuthorizer(new MailListenerAuthorizer($this));

        parent::__construct($agent);
    }
}
