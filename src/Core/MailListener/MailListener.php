<?php

namespace Core\MailListener;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class MailListener extends Model implements EntityContract
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mail_listeners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'target', 'content', 'enabled', 'event_class', 'subject'];
}
