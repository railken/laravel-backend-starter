<?php

namespace Core\Disk;

use Railken\Laravel\Manager\ModelRepository;

class DiskRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Disk::class;
}
