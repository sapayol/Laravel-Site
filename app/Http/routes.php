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

Route::get('/',                         				 ['uses' => 'PagesController@index',              'as' => 'pages.home']);
Route::get('/who-we-are',                        ['uses' => 'PagesController@about',              'as' => 'pages.about']);
Route::get('/how-it-works',                      ['uses' => 'PagesController@howItWorks',         'as' => 'pages.how-it-works']);

Route::resource('jackets', 'JacketsController');
Route::get('/jackets/{model}/look',              ['uses' => 'JacketsController@look',             'as' => 'jackets.look']);
Route::get('/jackets/{model}/fit',               ['uses' => 'JacketsController@fit',              'as' => 'jackets.fit']);
Route::get('/jackets/{model}/checkout',          ['uses' => 'JacketsController@getCheckout',      'as' => 'jackets.checkout']);
Route::post('/jackets/{model}/checkout',         ['uses' => 'JacketsController@postCheckout',     'as' => 'jackets.post-checkout']);
Route::get('/jackets/{model}/checkout/complete', ['uses' => 'JacketsController@checkoutComplete', 'as' => 'jackets.checkout-complete']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);