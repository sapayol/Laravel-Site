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

		JavaScript::put(['jacket' => $jacket, 'session' => Session::all()]);

		return view('pages.jackets.look', ['jacket' => $jacket]);
	}
}
