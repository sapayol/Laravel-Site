<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jacket;

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
		return view('pages.coming-soon');
	}

	public function index()
	{
		$jackets = Jacket::orderBy('active', 'DESC')->get();
		return view('pages.home', ['jackets' => $jackets]);
	}

	public function whoWeAre()
	{
		return view('pages.info.who-we-are');
	}

	public function about()
	{
		return view('pages.info.about');
	}

	public function howItWorks()
	{
		return view('pages.info.how-it-works');
	}

	public function ourLeather(Request $request)
	{
		return view('pages.info.our-leather', ['jacket' => $request->jacket]);
	}

	public function materials(Request $request)
	{
		return view('pages.info.leather-materials', ['jacket' => $request->jacket]);
	}

	public function instructions(Request $request)
	{
		return view('pages.info.care-instructions', ['jacket' => $request->jacket]);
	}

	public function terms()
	{
		return view('pages.info.terms');
	}

}
