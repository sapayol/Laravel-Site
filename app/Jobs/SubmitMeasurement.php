<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Order;
use App\Models\Measurement;
use Illuminate\Contracts\Bus\SelfHandling;

class SubmitMeasurement extends Job implements SelfHandling
{
    protected $measurements;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($measurements, $id)
    {
        $this->measurements = $measurements;
        $this->order = Order::find($id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->order->userMeasurements) {
            Measurement::create(array_merge($this->measurements, ['order_id' => $this->order->id]));
        } elseif ($this->measurements) {
            $this->order->userMeasurements->update($this->measurements);
        }

        if ($this->order->isNew()) {
            $this->order->status = 'started';
            $this->order->save();
        }

        return $this->order;
    }
}
