<?php

namespace Core\Env;

use Railken\Laravel\Manager\ModelRepository;

class EnvRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Env::class;
}
