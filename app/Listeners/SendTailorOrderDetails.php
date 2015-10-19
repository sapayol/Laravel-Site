<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToInProgress;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\AdminMailer;

class SendTailorOrderDetails
{

    private $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AdminMailer $mailer)
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
        $this->mailer->sendTailerOrderDetails($event->order);
    }
}
