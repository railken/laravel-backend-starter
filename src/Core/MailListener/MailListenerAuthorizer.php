<?php

namespace Core\MailListener;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class MailListenerAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'mail_listener.create',
        Tokens::PERMISSION_UPDATE => 'mail_listener.update',
        Tokens::PERMISSION_SHOW   => 'mail_listener.show',
        Tokens::PERMISSION_REMOVE => 'mail_listener.remove',
    ];
}
