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
        'App\Events\AccountWasCreated' => [
            'App\Listeners\SendAccountConfirmationEmail'
        ],
        'App\Events\OrderPaymentWasProcessed' => [
            'App\Listeners\SendOrderConfirmations',
        ],
        'App\Events\OrderStatusChangedToReviewed' => [
            'App\Listeners\SendMeasurementConfirmation'
        ],
        'App\Events\OrderStatusChangedToInProgress' => [
            'App\Listeners\SendProductionStart',
            'App\Listeners\SendTailorOrderDetails'
        ],
        'App\Events\OrderStatusChangedToShipped' => [
            'App\Listeners\SendShippingNotification'
        ],
        'App\Events\OrderStatusChangedToCompleted' => [
            'App\Listeners\SendDeliveryNotification'
        ],
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
