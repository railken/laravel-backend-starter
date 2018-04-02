<?php

namespace Core\Env;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class Env extends Model implements EntityContract
{

    use HasEncryptedAttributes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'env';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'created_at', 'updated_at', 'key', 'value'];

    protected $encrypted = [
        'key',
        'value'
    ];
}
