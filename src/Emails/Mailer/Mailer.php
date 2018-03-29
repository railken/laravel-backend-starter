<?php

namespace Emails\Mailer;

class Mailer
{
    protected $client;

    /**
     * Initialize the Mailer
     */
    public function __construct()
    {
        $this->client = "";
    }
}
