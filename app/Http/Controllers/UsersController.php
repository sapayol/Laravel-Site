<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use User;

class UsersController extends Controller {

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


	public function userOrders($id)
	{

		$user = User::find($id);
		$last_order = $user->unfinishedOrders->last();

		return view('pages.coming-soon');
	}


}
