<?php
namespace Api\Http\Controllers\Admin;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\Env\EnvManager;
use Api\Http\Controllers\Traits as RestTraits;
use Api\Http\Controllers\RestController;

class EnvsController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestRemoveTrait;

    protected static $query = [
        'id',
        'key',
        'value',
        'created_at',
        'updated_at',
    ];

    protected static $fillable = [
        'key',
        'value',
    ];

    /**
     * Construct
     *
     */
    public function __construct(EnvManager $manager)
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
