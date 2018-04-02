<?php

namespace Core\Config;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Railken\Laravel\Manager\Contracts\EntityContract;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class Config extends Model implements EntityContract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'configs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 
        'key'
    ];

    protected $encrypted = [
        'key',
        'value'
    ];
}
