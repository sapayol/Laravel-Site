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

        foreach ($this->measurements as $measurement) {
            str_replace(',', '.', $measurement);
        }
        if (!$this->order->bodyMeasurements) {
            Measurement::create(array_merge($this->measurements, ['order_id' => $this->order->id, 'type' => 'body']));
        } elseif ($this->measurements) {
            // Prevents a blank note from holding up the order process
            if (isset($this->measurements['note']) && $this->measurements['note'] == '') {
                $this->measurements['note'] = '-';
            }
            $this->order->bodyMeasurements->update($this->measurements);
        }

        if ($this->order->isNew()) {
            $this->order->status = 'started';
            $this->order->save();
        }

        return $this->order;
    }
}
