<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attributes';

  public function orders()
  {
    return $this->belongsToMany('Order');
  }

  public function jackets()
  {
    return $this->belongsToMany('Jacket');
  }

}
