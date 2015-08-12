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

  public function orders()
  {
    return $this->belongsTo('Order');
  }

}
