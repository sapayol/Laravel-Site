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
Route::get('/jackets/{model}/fit',               ['uses' => 'JacketsController@fit',      'as' => 'jackets.fit']);

Route::resource('orders', 'OrdersController');
Route::resource('users', 'UsersController');
Route::post('/orders/{id}/process',              ['uses' => 'OrdersController@process',   'as' => 'orders.process']);
Route::get('/orders/{id}/complete',              ['uses' => 'OrdersController@complete',  'as' => 'orders.complete']);


// Route::get('checkout',                           ['uses' => 'OrdersController@create',             'as' => 'checkout.customer-info']);
// Route::post('checkout',                          ['uses' => 'OrdersController@postOrders',     'as' => 'checkout.post-checkout']);
// Route::get('checkout/complete',                  ['uses' => 'OrdersController@checkoutComplete', 'as' => 'checkout.complete']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);