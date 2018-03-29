<?php
namespace Api\Http\Controllers\Admin;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\File\FileManager;
use Api\Http\Controllers\Traits as RestTraits;
use Api\Http\Controllers\RestController;

class FilesController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestShowTrait;


    protected static $query = [
        'id',
        'storage',
        'type',
        'path',
        'status',
        'checksum',
        'created_at',
        'updated_at'
    ];

    protected static $fillable = [
        'storage',
        'type',
        'path',
        'status',
        'checksum',
    ];

    /**
     * Construct
     *
     */
    public function __construct(FileManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }


    /**
     * Create a new instance for query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
