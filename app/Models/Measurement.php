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

  public $measurement_names = ['height', 'half_shoulder', 'back_width', 'chest' , 'stomach' , 'back_length', 'waist', 'arm', 'biceps', 'note'];

  public function order()
  {
    return $this->belongsTo('Order');
  }

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function getIncompleteMeasurements()
  {
  	$results = [];
    foreach ($this->measurement_names as $key => $measurement_name) {
      if ($this->$measurement_name == '' || $this->$measurement_name == null) {
				$results[$key] = $measurement_name;
    	}
    }
    return $results;
  }

  public function getCompleteMeasurements()
  {
  	$results = [];
    foreach ($this->measurement_names as $key => $measurement_name) {
    	if ($this->$measurement_name !== '' && $this->$measurement_name !== null) {
				$results[$key] = $measurement_name;
    	}
    }
    return $results;
  }
}
