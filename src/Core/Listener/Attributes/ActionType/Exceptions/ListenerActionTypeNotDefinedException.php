<?php

namespace Core\Listener\Attributes\ActionType\Exceptions;

use Core\Listener\Exceptions\ListenerAttributeException;

class ListenerActionTypeNotDefinedException extends ListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'action_type';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LISTENER_ACTION_TYPE_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}