<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'measurements';

  protected $guarded = array();

  public function order()
  {
    return $this->belongsTo('Order');
  }

  public function getIncompleteMeasurements()
  {
  	$results = [];
    foreach ($this->attributes as $key => $value) {
    	if (($key != 'size' && $key != 'type' && $key != 'units') && ($value == null || $value == '0.00')) {
				$results[] = $key;
    	}
    }
    return $results;
  }

  public function getCompleteMeasurements()
  {
  	$results = [];
    foreach ($this->attributes as $key => $value) {
    	if (($key != 'size' && $key != 'type' && $key != 'units') && $value != null) {
				$results[$key] = $value;
    	}
    }
    return $results;
  }
}
