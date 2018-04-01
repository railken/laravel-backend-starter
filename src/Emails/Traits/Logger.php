<?php

namespace Emails\Traits;
use Illuminate\Contracts\Mail\Mailer as MailerContract;

trait Logger
{
	
    /**
     * Send the message using the given mailer.
     *
     * @param  \Illuminate\Contracts\Mail\Mailer  $mailer
     * @return void
     */
    public function send(MailerContract $mailer)
    {
        parent::send($mailer);

        foreach ($this->to as $i => $to) {
	        $result = (new \Core\MailLog\MailLogManager())->create([
	            'subject' => $this->subject,
	            'to' => $this->to[$i]['address'],
	            'to_name' => $this->to[$i]['name'],
	            'body' => view($this->buildView(), $this->buildViewData()),
	            'sent' => 1,
	        ]);

    	}
    }
}