<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToShipped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\AdminMailer;

class SendShippingNotification implements ShouldQueue
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
     * @param  OrderStatusChangedToShipped  $event
     * @return void
     */
    public function handle(OrderStatusChangedToShipped $event)
    {
        $this->mailer->sendShippingNotification($event->order);
    }
}
