<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jacket extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jackets';

	//===========================================================================//
  //                                RELATIONSHIPS                              //
  //===========================================================================//

  public function attributes()
  {
    return $this->belongsToMany('Attribute');
  }

  public function orders()
  {
    return $this->belongsTo('Order');
  }

  public function leather_colors()
  {
    return $this->attributes()->where('type', '=', 'leather_color')->get();
  }

  public function leather_types()
  {
    return $this->attributes()->where('type', '=', 'leather_type')->get();
  }

  public function hardware_colors()
  {
    return $this->attributes()->where('type', '=', 'hardware_color')->get();
  }

  public function lining_colors()
  {
    return $this->attributes()->where('type', '=', 'lining_color')->get();
  }

}
