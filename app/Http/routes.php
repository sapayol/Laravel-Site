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
Route::get('/orders/{id}/fit/{step}',            ['uses' => 'OrdersController@getFit',    'as' => 'orders.fit']);

Route::post('/orders/{id}/fit/{step}',           ['uses' => 'OrdersController@postFit',   'as' => 'orders.fit']);

// Route::get('/orders/{id}/fit/units',             ['uses' => 'OrdersController@units',    'as' => 'fit.units']);
// Route::get('/orders/{id}/fit/shoulder',          ['uses' => 'OrdersController@shoulder', 'as' => 'fit.shoulder']);
// Route::get('/orders/{id}/fit/back',              ['uses' => 'OrdersController@back',     'as' => 'fit.back']);
// Route::get('/orders/{id}/fit/chest',             ['uses' => 'OrdersController@chest',    'as' => 'fit.chest']);
// Route::get('/orders/{id}/fit/stomach',           ['uses' => 'OrdersController@stomach',  'as' => 'fit.stomach']);
// Route::get('/orders/{id}/fit/jacket',            ['uses' => 'OrdersController@jacket',   'as' => 'fit.jacket']);
// Route::get('/orders/{id}/fit/waist',             ['uses' => 'OrdersController@waist',    'as' => 'fit.waist']);
// Route::get('/orders/{id}/fit/sleeve',            ['uses' => 'OrdersController@sleeve',   'as' => 'fit.sleeve']);
// Route::get('/orders/{id}/fit/biceps',            ['uses' => 'OrdersController@biceps',   'as' => 'fit.biceps']);

// Route::get('checkout',                           ['uses' => 'OrdersController@create',             'as' => 'checkout.customer-info']);
// Route::post('checkout',                          ['uses' => 'OrdersController@postOrders',     'as' => 'checkout.post-checkout']);
// Route::get('checkout/complete',                  ['uses' => 'OrdersController@checkoutComplete', 'as' => 'checkout.complete']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);