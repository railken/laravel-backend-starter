<?php

namespace Api\Http\Controllers\User;

use Illuminate\Http\Request;
use Core\Notification\NotificationManager;

use Api\Http\Controllers\Traits\RestIndexTrait;
use Api\Http\Controllers\Traits\RestShowTrait;
use Api\Http\Controllers\Traits\RestCreateTrait;
use Api\Http\Controllers\Traits\RestUpdateTrait;
use Api\Http\Controllers\Traits\RestRemoveTrait;
use Api\Http\Controllers\RestController;

class NotificationsController extends RestController
{
    use RestIndexTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index
     *
     * @var array
     */
    public static $query = [
        'id',
        'type', 
        'notifiable_type',
        'notifiable_id', 
        'data', 
        'read_at',
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
        'type', 
        'notifiable_type',
        'notifiable_id', 
        'data', 
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function __construct(NotificationManager $manager)
    {
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
        return $this->manager->repository->getQuery()->where(['notifiable_type' => 'Core\User\User', 'notifiable_id' => $this->getUser()->id])->whereNull('read_at');
    }

}
