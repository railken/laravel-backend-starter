<?php

namespace Emails\Mail;

use Core\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Emails\Traits\Logger;

class UserConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, Logger;

    /**
     * The user instance.
     *
     * @var \Core\User\User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->user->enabled ? 'Emails::user_confirmation_change_email' : 'Emails::user_confirmation_email')->subject('Welcome');
    }
}
