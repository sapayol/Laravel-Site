<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';

  protected $guarded = array();

  public function order()
  {
    return $this->belongsTo('Order');
  }

}
