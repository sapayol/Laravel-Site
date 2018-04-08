<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
		$user = Auth::user();
		$jacket = Jacket::where('model', '=', $model)->firstOrFail();
		JavaScript::put([
			'attributes' => $jacket->attributes()->get(),
			'jacket' => $jacket,
			'session' => Session::all()
		]);

		if ($user && $user->unfinishedOrders()->count() > 0) {
			$order = Auth::user()->unfinishedOrders->last();
		} else {
			$order = null;
		}

		return view('pages.jackets.' . $model, ['jacket' => $jacket, 'unfinished_order' => $order]);
	}
}
