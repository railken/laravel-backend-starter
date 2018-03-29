<?php

namespace Core\User;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\ParameterBag;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Railken\Bag;
use Railken\Laravel\Manager\ResultAction;
use Illuminate\Support\Facades\DB;

class UserManager extends ModelManager
{
    /**
     * Attributes
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Name\NameAttribute::class,
        Attributes\Email\EmailAttribute::class,
        Attributes\Password\PasswordAttribute::class,
        Attributes\Enabled\EnabledAttribute::class,
    ];

    /**
     * List of all exceptions
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\UserNotAuthorizedException::class
    ];

    /**
     * Construct
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new UserRepository($this));
        $this->setSerializer(new UserSerializer($this));
        $this->setAuthorizer(new UserAuthorizer($this));
        $this->setValidator(new UserValidator($this));
        
        parent::__construct($agent);
    }

    /**
     * Create a confirmation email token for given user
     *
     * @param User $user
     * @param string $email
     *
     * @return UserPendingEmail
     */
    public function createConfirmationEmailToken(User $user, string $email)
    {
        $p = UserPendingEmail::where(['email' => $email, 'user_id' => $user->id])->first();

        if ($p) {
            return $p;
        }

        do {
            $token = strtoupper(str_random(4)."-".str_random(4));
            $exists = UserPendingEmail::where('token', $token)->count();
        } while ($exists > 0);

        return UserPendingEmail::create(['token' => $token, 'email' => $email, 'user_id' => $user->id]);
    }

    /**
     * Find UserPendingEmail by token
     *
     * @param string $token
     *
     * @return UserPendingEmail
     */
    public function findUserPendingEmailByToken(string $token)
    {
        return UserPendingEmail::where(['token' => $token])->first();
    }

    /**
     * @inherit
     */
    public function delete(EntityContract $entity)
    {
        

        $result = new ResultAction();

        $result->addErrors($this->authorizer->authorize(Tokens::PERMISSION_REMOVE, $entity, ParameterBag::factory([])));

        if (!$result->ok()) {
            return $result;
        }

        try {
            DB::beginTransaction();
            $entity->delete();
            $entity->residence1()->delete();
            $entity->residence2()->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $result;
    }

    /**
     * Change user password
     *
     * @param EntityContract $user
     * @param string $password_old
     * @param string $password_new
     *
     * @return \Railken\Laravel\Manager\ResultAction
     */
    public function changePassword(EntityContract $user, $password_old, $password_new)
    {
        // Check password_old

        $errors = new Collection();

        !$this->checkPassword($user, $password_old) && $errors->push(new Attributes\Password\Exceptions\UserPasswordOldNotValidException());

        if ($errors->count() > 0) {
            $result = new \Railken\Laravel\Manager\ResultAction();
            $result->addErrors($errors);

            return $result;
        }

        return $this->update($user, new Bag(['password' => $password_new]));
    }


    /**
     * Change user email
     *
     * @param EntityContract $user
     * @param string $email
     *
     * @return \Railken\Laravel\Manager\ResultAction
     */
    public function changeEmail(EntityContract $user, $email)
    {
        $errors = new Collection();

        $this->attributes->filter(function ($attribute) {
            return $attribute->getName() === 'email';
        })->first()->validate($user, new Bag(['email' => $email]));
        
        $result = new \Railken\Laravel\Manager\ResultAction();

        if ($errors->count() > 0) {
            $result->addErrors($errors);

            return $result;
        }

        $result->setResources(new Collection([$this->createConfirmationEmailToken($user, $email)]));

        return $result;
    }


    /**
     * Is current password
     *
     * @param EntityContract $user
     * @param string $password
     *
     * @return boolean
     */
    public function checkPassword(EntityContract $user, $password)
    {
        return Hash::check($password, $user->password);
    }


    /**
     * Update a EntityContract given parameters.
     *
     * @param EntityContract     $entity
     * @param ParameterBag|array $parameters
     * @param string             $permission
     *
     * @return ResultAction
     */
    public function update(EntityContract $entity, $parameters, $permission = Tokens::PERMISSION_UPDATE)
    {
        $parameters = $this->castParameters($parameters);


        // This will permit to edit the password without overwriting if empty is sent.
        if ($entity->exists && $parameters->exists('password') && empty($parameters->get('password'))) {
            $parameters->remove('password');
        }

        return parent::update($entity, $parameters, $permission);
    }


}