<?php namespace App\Http\Controllers;

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

	public function about()
	{
		return view('04-pages.about-us');
	}

	public function howItWorks()
	{
		return view('04-pages.how-it-works');
	}

}
