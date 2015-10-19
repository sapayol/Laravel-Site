<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToInProgress;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\OrderMailer;

class SendProductionStart implements ShouldQueue
{

    private $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(OrderMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  OrderStatusChangedToInProgress  $event
     * @return void
     */
    public function handle(OrderStatusChangedToInProgress $event)
    {
        $this->mailer->sendProductionStart($event->order);
    }
}
