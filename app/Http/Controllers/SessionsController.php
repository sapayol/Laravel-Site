<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Session;

class SessionsController extends Controller {

	public function index()
	{
		$session = Session::all();

		return Response::json($session, 200);
	}

	public function show($key)
	{
		$session = $key == "id" ? Session::getId() : Session::get($key);

		return Response::json($session, 200);
	}

	public function store(Request $request)
	{
		$input = $request->input();

		foreach ($input as $key => $value) {
			$value == null ? Session::forget($key) :	Session::put($key, $value);
		}

		$session = Session::all();

		return Response::json($session, 200);
	}

	public function destroy($key)
	{
		$key == "flush" ? Session::flush() : Session::remove($key);

		$session = Session::all();

		return Response::json($session, 200);
	}

}
