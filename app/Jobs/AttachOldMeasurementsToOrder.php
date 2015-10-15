<?php

namespace App\Jobs;

use App\Jobs\Job;
use Order, Measurement;
use Illuminate\Contracts\Bus\SelfHandling;

class AttachOldMeasurementsToOrder extends Job implements SelfHandling
{
    protected $old_measurements;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($old_measurements, Order $order)
    {
        $this->old_measurements = $old_measurements->toArray();
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        unset($this->old_measurements['id'], $this->old_measurements['created_at'], $this->old_measurements['updated_at'], $this->old_measurements['user_id'], $this->old_measurements['user']);
        Measurement::create(array_merge($this->old_measurements, ['order_id' => $this->order->id]));
        $this->order->status = 'started';
        $this->order->save();

        return $this->order;
    }
}
