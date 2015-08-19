<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',                         				 ['uses' => 'PagesController@comingSoon', 'as' => 'pages.coming-soon']);
Route::get('/home',                         		 ['uses' => 'PagesController@index',      'as' => 'pages.home']);
Route::get('/who-we-are',                        ['uses' => 'PagesController@whoWeAre',   'as' => 'pages.who-we-are']);
Route::get('/how-it-works',                      ['uses' => 'PagesController@howItWorks', 'as' => 'pages.how-it-works']);

Route::resource('jackets', 'JacketsController');
Route::get('/jackets/{model}/look',              ['uses' => 'JacketsController@look',     'as' => 'jackets.look']);

Route::resource('orders', 'OrdersController');
Route::post('/orders/{id}/process',              ['uses' => 'OrdersController@process',   'as' => 'orders.process']);
Route::get('/orders/{id}/complete',              ['uses' => 'OrdersController@complete',  'as' => 'orders.complete']);
Route::get('/orders/{id}/fit/{step}',            ['uses' => 'OrdersController@getFit',    'as' => 'orders.fit']);
Route::post('/orders/{id}/fit/{step}',           ['uses' => 'OrdersController@postFit',   'as' => 'orders.fit']);
Route::get('/orders/{id}/checkout',              ['uses' => 'OrdersController@checkout',  'as' => 'orders.checkout']);
Route::get('/orders/{id}/complete',              ['uses' => 'OrdersController@complete',  'as' => 'orders.complete']);

Route::resource('users', 'UsersController');

// API endpoints for managing the session from JavaScript
//-------------------------------------------------------------------------
Route::get('session',                            ['uses' => 'SessionsController@index',   'as' => 'session.index']);
Route::post('session',                           ['uses' => 'SessionsController@store',   'as' => 'session.store']);
Route::get('session/{key}',                      ['uses' => 'SessionsController@show',    'as' => 'session.show']);
Route::delete('session/{key}',                   ['uses' => 'SessionsController@destroy', 'as' => 'session.destroy']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);