<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jacket;
use Measurement;

class JacketsController extends Controller {

	public function index()
	{
		$jackets = Jacket::all();

		return view('04-pages.jackets.index', ['jackets' => $jackets]);
	}

	public function show($model)
	{
		$jacket = Jacket::where('model', '=', $model)->first();

		return view('04-pages.jackets.show', ['jacket' => $jacket]);
	}

	public function look($model)
	{
		$jacket = Jacket::where('model', '=', $model)->first();

		return view('04-pages.jackets.look', ['jacket' => $jacket]);
	}

	public function fit($model, Request $request)
	{
		$jacket = Jacket::where('model', '=', $model)->first();
		$measurements = Measurement::where('type', '=', 'standard')->get();

		return view('04-pages.jackets.fit', [
			'jacket'         => $jacket,
			'measurements'   => $measurements,
			'leather_type'   => $request->type,
			'leather_color'  => $request->color,
			'lining_color'   => $request->lining,
			'hardware_color' => $request->hardware
		]);
	}

	public function getCheckout($model, Request $request)
	{
		$jacket = Jacket::where('model', '=', $model)->first();

		return view('04-pages.jackets.checkout', ['jacket' => $jacket]);
	}

	public function postCheckout()
	{
		return redirect()->route('jackets.checkout-complete');
	}

	public function checkoutComplete()
	{
		return view('04-pages.jackets.checkout-complete');
	}

}
