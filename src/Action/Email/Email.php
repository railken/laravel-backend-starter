<?php

namespace Action\Email;

use Illuminate\Database\Eloquent\Model;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Email extends Model implements EntityContract
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'action_emails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'created_at', 'updated_at', 'deleted_at', 'targets', 'subject', 'content', 'template'];

    /**
     * Set the the email targets
     *
     * @param mixed $value
     *
     * @return void
     */
    public function setTargetsAttribute($value)
    {
        $this->attributes['targets'] = json_encode(is_array($value) ? $value : explode(",", str_replace(" ", "", $value)));
    }


    /**
     * Get the the email targets
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function getTargetsAttribute($value)
    {
        return json_decode($value, true);
    }
}