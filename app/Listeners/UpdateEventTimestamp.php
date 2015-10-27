<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\AdminMailer;

class UpdateEventTimestamp
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UpdateEventTimestamp $event
     * @return void
     */
    public function handle($event)
    {
      switch (get_class($event)) {
        case 'App\Events\OrderPaymentWasProcessed':
          $event->order->paid_at = date('y-m-d h:i:s');
          break;
        case 'App\Events\OrderStatusChangedToShipped':
          $event->order->shipped_at = date('y-m-d h:i:s');
          break;
        case 'App\Events\OrderStatusChangedToCompleted':
          $event->order->completed_at = date('y-m-d h:i:s');
          break;
        default:
          break;
      }
      $event->order->save();
    }
  }
