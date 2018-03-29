<?php

namespace Core\Log;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\ParameterBag;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\Tokens;

class LogManager extends ModelManager
{

    /**
     * List of all exceptions
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\LogNotAuthorizedException::class
    ];


    /**
     * Attributes
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Message\MessageAttribute::class,
        Attributes\Category\CategoryAttribute::class,
        Attributes\Vars\VarsAttribute::class,
    ];
    
    /**
     * Construct
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new LogRepository($this));
        $this->setSerializer(new LogSerializer($this));
        $this->setAuthorizer(new LogAuthorizer($this));
        $this->setValidator(new LogValidator($this));

        parent::__construct($agent);
    }
}