<?php

namespace App\Listeners;

use App\Events\UserRequestedPasswordReset;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPasswordResetEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRequestedPasswordReset  $event
     * @return void
     */
    public function handle(UserRequestedPasswordReset $event)
    {
        //
    }
}
