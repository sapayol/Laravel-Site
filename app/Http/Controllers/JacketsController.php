<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jacket;
use Measurement;
use Route;
use JavaScript;
use Session;

class JacketsController extends Controller {

	public function index()
	{
		$jackets = Jacket::orderBy('active', 'DESC')->get();

		return view('pages.jackets.index', ['jackets' => $jackets]);
	}

	public function show($model)
	{
		$jacket = Jacket::where('model', '=', $model)->first();

		return view('pages.jackets.' . $model, ['jacket' => $jacket]);
	}

	public function look($model)
	{
		$jacket = Jacket::where('model', '=', $model)->first();

		// If a user already has an order started then use the look choices from that order
		if ($this->current_user && $this->current_user->unfinishedOrders()->count() > 0) {
			$jacket_array = $jacket->toArray();
			foreach ($this->current_user->unfinishedOrders->last()->attributes as $attribute) {
				$jacket_array[$attribute->type] = $attribute->id;
			}
			Session::put($model, $jacket_array);
		}

		JavaScript::put(['jacket' => $jacket, 'session' => Session::all()]);

		return view('pages.jackets.look', ['jacket' => $jacket]);
	}
}
