<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jacket;
use Measurement;
use Route;

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

		return view('04-pages.jackets.fit', [
			'jacket'         => $jacket,
			'leather_type'   => $request->leather_type,
			'leather_color'  => $request->leather_color,
			'lining_color'   => $request->lining_color,
			'hardware_color' => $request->hardware_color
		]);
	}

}
