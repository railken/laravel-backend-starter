<?php

namespace Api\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Core\MailLog\MailLogManager;

use Api\Http\Controllers\Traits\RestIndexTrait;
use Api\Http\Controllers\Traits\RestShowTrait;
use Api\Http\Controllers\Traits\RestCreateTrait;
use Api\Http\Controllers\Traits\RestUpdateTrait;
use Api\Http\Controllers\Traits\RestRemoveTrait;
use Api\Http\Controllers\RestController;

class MailLogsController extends RestController
{
    use RestIndexTrait;
    use RestShowTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index
     *
     * @var array
     */
    public static $query = [
        'id',
        'to',
        'to_name',
        'subject',
        'body',
        'sent',
        'created_at',
        'updated_at',
    ];

    /**
     * List of params that can be selected in the index
     *
     * @var array
     */
    public static $selectable = [
        'id',
        'to',
        'to_name',
        'subject',
        'body',
        'sent',
        'created_at',
        'updated_at',
    ];

    public function __construct(MailLogManager $manager){

        $this->manager = $manager;
        parent::__construct();
    }

    /**
     * Create a new instance for query
     *
     * @return QueryBuilder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }

}