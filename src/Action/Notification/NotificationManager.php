<?php

namespace Action\Notification;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use Illuminate\Support\Collection;

class NotificationManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class, 
        Attributes\Name\NameAttribute::class, 
        Attributes\CreatedAt\CreatedAtAttribute::class, 
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\Description\DescriptionAttribute::class,
        Attributes\Targets\TargetsAttribute::class, 
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\NotificationNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new NotificationRepository($this));
        $this->setSerializer(new NotificationSerializer($this));
        $this->setValidator(new NotificationValidator($this));
        $this->setAuthorizer(new NotificationAuthorizer($this));

        parent::__construct($agent);
    }

    /**
     * Resolve event.
     *
     * @param Notification $action
     * @param mixed $event
     */
    public function resolve(Notification $action, $event)
    {

        $user = (new \Core\User\UserManager())->getRepository()->findOneById($event->user->id);
        $users = new Collection();

        $repository = (new \Core\User\UserManager())->getRepository();
        (new Collection($action->targets))->map(function ($target) use ($event, $repository, &$users) {

            print_r($target);
            if ($target === "{{user.id}}") {
                $users[] = $repository->findOneById($event->user->id);
            } 

            if ($target === "@admin") {
                $users = $users->merge($repository->newQuery()->where('role', '=', 'admin')->get());
            }

        });


        NotificationFacade::send($users, new BaseNotification($event));
    }
}
