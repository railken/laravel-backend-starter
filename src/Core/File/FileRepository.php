<?php

namespace Core\File;

use Railken\Laravel\Manager\ModelRepository;

class FileRepository extends ModelRepository
{

    /**
     * Class name entity
     *
     * @var string
     */
    public $entity = File::class;

    /**
     * Find a file that have the path
     *
     * @param string $path
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function newQueryOneDiskPath($path)
    {
        return $this->getQuery()->where('storage', 'disk')->where('path', 'like', '%'.$path.'%');
    }
}
