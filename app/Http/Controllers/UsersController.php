<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use User;

class UsersController extends Controller {

	public function show($id)
	{

		$user = User::find($id);

		return view('pages.users.show', ['user' => $user]);
	}
}
