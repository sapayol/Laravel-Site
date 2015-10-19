<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Order;
use Illuminate\Contracts\Bus\SelfHandling;

class ResetOrder extends Job implements SelfHandling
{

    protected $id;

    protected $retain_measurements;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $retain_measurements = null)
    {
        $this->retain_measurements = $retain_measurements;
        $this->order = Order::find($id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->retain_measurements) {
            $this->order->userMeasurements->user_id = $this->order->user->id;
            $this->order->userMeasurements->save();
        }

        $this->order->status = 'dropped';
        $this->order->save();
    }
}
