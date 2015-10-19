<?php

namespace App\Listeners;

use App\Events\UserRequestedPasswordReset;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\UserMailer;

class SendPasswordResetEmail implements ShouldQueue
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
     * @param  UserRequestedPasswordReset  $event
     * @return void
     */
    public function handle(UserRequestedPasswordReset $event)
    {
        $this->mailer->sendPasswordResetEmail($event->order);
    }
}
