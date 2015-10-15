<?php

namespace App\Jobs;

use Measurement;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class SwitchMeasurementUnits extends Job implements SelfHandling
{
    protected $measurements;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Measurement $measurements)
    {
        $this->measurements = $measurements;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->measurements->measurement_names as $name) {
            if ($name == 'note') {
                break;
            } elseif ($this->measurements->$name == null || $this->measurements->$name == 0) {
                $this->measurements->$name = null;
            } elseif ($this->measurements->units == 'in') {
                $this->measurements->$name = round($this->measurements->$name * 2.54, 0);
            } else {
                $this->measurements->$name /= 2.54;
            }
        }

        $this->measurements->units = $this->measurements->units == 'in' ? 'cm' : 'in';
        $this->measurements->save();

        return $this->measurements;
    }
}
