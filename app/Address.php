<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';

  public function orders()
  {
    return $this->belongsTo('Order');
  }

}
