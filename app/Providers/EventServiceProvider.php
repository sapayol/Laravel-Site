<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\OrderPaymentWasProcessed' => [
            'App\Listeners\UpdateEventTimestamp',
            'App\Listeners\SendOrderConfirmations',
        ],
        'App\Events\OrderStatusChangedToProduction' => [
            'App\Listeners\UpdateEventTimestamp',
            'App\Listeners\SendProductionStart',
            'App\Listeners\SendTailorOrderDetails'
        ],
        'App\Events\OrderStatusChangedToShipped' => [
            'App\Listeners\UpdateEventTimestamp',
            'App\Listeners\SendShippingNotification'
        ],
        'App\Events\OrderStatusChangedToCompleted' => [
            'App\Listeners\UpdateEventTimestamp',
            'App\Listeners\SendDeliveryNotification'
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
