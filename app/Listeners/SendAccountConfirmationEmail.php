<?php

namespace App\Listeners;

use App\Events\AccountWasCreated ;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\UserMailer;

class SendAccountConfirmationEmail implements ShouldQueue
{

    private $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  AccountWasCreated   $event
     * @return void
     */
    public function handle(AccountWasCreated  $event)
    {
        $this->mailer->sendAccountConfirmationEmail($event->order);
    }
}
