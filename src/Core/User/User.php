<?php

namespace Core\User;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Core\Manga\Manga;
use Core\Address\Address;
use Core\File\File;

class User extends Authenticatable implements EntityContract
{
    use HasApiTokens, Notifiable;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'firstname',
        'lastname',
        'enabled',
        'name',
        'role',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'valid_from_at',
        'valid_to_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pendingEmail()
    {
        return $this->hasOne(UserPendingEmail::class, 'user_id')->latest();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fileAvatar()
    {
        return $this->belongsTo(File::class, 'file_avatar_id')->latest();
    }

    /**
     * Set password attribute
     *
     * @param string $pass
     *
     * @return void
     */
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = bcrypt($pass);
    }

    /**
     * Retrieve user for passport oauth
     *
     * @param string $identifier
     *
     * @return User
     */
    public function findForPassport($identifier)
    {
        return (new \Core\User\UserManager())->getRepository()->getQuery()->orWhere(function ($q) use ($identifier) {
            return $q->orWhere('email', $identifier)->orWhere('name', $identifier);
        })->where('enabled', 1)->first();
    }
}
