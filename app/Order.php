<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

	//===========================================================================//
  //                                RELATIONSHIPS                              //
  //===========================================================================//

  public function address()
  {
    return $this->hasOne('Address');
  }

  public function attributes()
  {
    return $this->belongsToMany('Attribute');
  }

  public function jacket()
  {
    return $this->hasOne('Jacket');
  }

  public function measurement()
  {
    return $this->hasOne('Measurement');
  }

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function leatherColor()
  {
    return $this->attributes->where('type', '=', 'leather_color')->first();
  }

  public function leatherType()
  {
    return $this->attributes->where('type', '=', 'leather_type')->first();
  }

  public function hardwareColor()
  {
    return $this->attributes->where('type', '=', 'hardware_color')->first();
  }

  public function liningColor()
  {
    return $this->attributes->where('type', '=', 'lining_color')->first();
  }

}
