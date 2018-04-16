<?php

namespace Action\Notification;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Notification extends Model implements EntityContract
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'action_notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'created_at', 'updated_at', 'deleted_at', 'description', 'targets'];

    /**
     * Resolve event
     *
     * @param $event
     */
    public function resolve($event)
    {
        (new NotificationManager())->resolve($this, $event);
    }
}
