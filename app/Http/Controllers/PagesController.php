<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/


	public function comingSoon()
	{
		return view('04-pages.coming-soon');
	}

	public function index()
	{
		return view('04-pages.home');
	}

	public function whoWeAre()
	{
		return view('04-pages.who-we-are');
	}

	public function howItWorks()
	{
		return view('04-pages.how-it-works');
	}

	public function ourLeather(Request $request)
	{
		return view('04-pages.our-leather', ['jacket' => $request->jacket]);
	}

}
