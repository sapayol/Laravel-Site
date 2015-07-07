<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jacket;
use Measurement;

class CheckoutController extends Controller {

	public function getCheckout(Request $request)
	{
		$jacket = Jacket::where('model', '=', $request->model)->first();

		return view('04-pages.checkout.customer-info', [
			'jacket'         => $jacket,
			'leather_type'   => $request->leather_type,
			'leather_color'  => $request->leather_color,
			'lining_color'   => $request->lining_color,
			'hardware_color' => $request->hardware_color
		]);
	}

	public function postCheckout()
	{
		return redirect()->route('checkout.complete');
	}

	public function checkoutComplete($model)
	{
		$jacket = Jacket::where('model', '=', $model)->first();

		return view('04-pages.checkout.complete', ['jacket' => $jacket]);
	}

}
