<?php

namespace App\Listeners;

use App\Events\AccountWasCreated ;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAccountConfirmationEmail
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
     * @param  AccountWasCreated   $event
     * @return void
     */
    public function handle(AccountWasCreated  $event)
    {
        //
    }
}
