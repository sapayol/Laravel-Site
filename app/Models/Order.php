<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
  protected $table = 'orders';


  protected $guarded = array();

  public    $statuses = ['new', 'started', 'paid', 'production', 'shipped', 'completed'];

	//===========================================================================//
  //                                RELATIONSHIPS                              //
  //===========================================================================//

  public function address()
  {
    return $this->belongsTo('Address');
  }

  public function attributes()
  {
    return $this->belongsToMany('Attribute');
  }

  public function jacket()
  {
    return $this->belongsTo('Jacket');
  }

  public function measurements()
  {
    return $this->hasMany('Measurement');
  }

  public function bodyMeasurements()
  {
    return $this->hasOne('Measurement')->where('type', '=', 'body');
  }

  public function productMeasurements()
  {
    return $this->hasOne('Measurement')->where('type', '=', 'product');
  }

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function leather_color()
  {
    return $this->attributes()->where('type', '=', 'leather_color')->first();
  }

  public function leather_type()
  {
    return $this->attributes()->where('type', '=', 'leather_type')->first();
  }

  public function hardware_color()
  {
    return $this->attributes()->where('type', '=', 'hardware_color')->first();
  }

  public function lining_color()
  {
    return $this->attributes()->where('type', '=', 'lining_color')->first();
  }

  public function hasNoStatus() {
    if ($this->status  === '' || $this->status === null) {
      return true;
    }
    return false;
  }

  public function isNew()
  {
    if ($this->status == 'started' || $this->status  == 'new' || $this->hasNoStatus()) {
      return true;
    }
    return false;
  }

  public function hasReusableMeasurements()
  {
    return $this->bodyMeasurements->user ? true : false;
  }

}
