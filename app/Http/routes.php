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

// Route::get('/',                         				 ['uses' => 'PagesController@comingSoon',  'as' => 'pages.coming-soon']);
Route::get('/',			                         		 ['uses' => 'PagesController@index',        'as' => 'home']);
Route::get('/home',                         		 ['uses' => 'PagesController@index',        'as' => 'pages.home']);
Route::get('/who-we-are',                        ['uses' => 'PagesController@whoWeAre',     'as' => 'pages.who-we-are']);
Route::get('/about',                             ['uses' => 'PagesController@about',        'as' => 'pages.about']);
Route::get('/how-it-works',                      ['uses' => 'PagesController@howItWorks',   'as' => 'pages.how-it-works']);
Route::get('/our-leather',                       ['uses' => 'PagesController@ourLeather',   'as' => 'pages.our-leather']);
Route::get('/leather-materials',                 ['uses' => 'PagesController@materials',    'as' => 'pages.leather-materials']);
Route::get('/care-instructions',                 ['uses' => 'PagesController@instructions', 'as' => 'pages.care-instructions']);
Route::get('/terms',                             ['uses' => 'PagesController@terms',        'as' => 'pages.terms']);

Route::get('/jackets/{model}/look',              ['uses' => 'JacketsController@look',       'as' => 'jackets.look']);
Route::resource('jackets', 'JacketsController');

Route::get('/orders/{id}/look',                  ['uses' => 'OrdersController@look',        'as' => 'orders.look']);
Route::patch('/orders/{id}/look/',               ['uses' => 'AdminController@updateLook',   'as' => 'orders.update_look']);
Route::patch('/orders/{id}/fit/',                ['uses' => 'AdminController@updateFit',    'as' => 'orders.update_fit']);
Route::get('/orders/{id}',                       ['uses' => 'OrdersController@show',        'as' => 'orders.show',         'middleware' => ['auth', 'order.owner', 'order.paid']]);
Route::post('/orders/{id}/fit',                  ['uses' => 'OrdersController@postFit',     'as' => 'fit.submit',          'middleware' => ['auth', 'order.owner', 'order.status']]);
Route::get('/orders/{id}/fit/{step}',            ['uses' => 'OrdersController@getFit',      'as' => 'fit.show',            'middleware' => ['auth', 'order.owner', 'order.status']]);
Route::patch('/orders/{id}/switch_units',        ['uses' => 'OrdersController@switchUnits', 'as' => 'orders.switch_units', 'middleware' => ['auth', 'order.owner', 'order.status']]);
Route::patch('/orders/{id}/reset',               ['uses' => 'OrdersController@resetOrder',  'as' => 'orders.reset',        'middleware' => ['auth', 'order.owner', 'order.status']]);
Route::get('/orders/{id}/checkout',              ['uses' => 'OrdersController@checkout',    'as' => 'orders.checkout',     'middleware' => ['auth', 'order.owner', 'order.paid', 'order.status']]);
Route::post('/orders/{id}/process',              ['uses' => 'OrdersController@process',     'as' => 'orders.process',      'middleware' => ['auth', 'order.owner']]);
Route::get('/orders/{id}/complete',              ['uses' => 'OrdersController@complete',    'as' => 'orders.complete',     'middleware' => ['auth', 'order.owner']]);
Route::resource('orders', 'OrdersController');

Route::get('/users/{id}',                        ['uses' => 'UsersController@show',        'as' => 'users.show',          'middleware' => ['auth', 'account.owner']]);
Route::resource('users', 'UsersController');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	Route::get('/',                      ['uses' => 'AdminController@dashboard',   'as' => 'admin.dashboard']);
	Route::get('/orders',                ['uses' => 'AdminController@orderIndex',  'as' => 'admin.order-index']);
	Route::get('/orders/{id}',           ['uses' => 'AdminController@showOrder',   'as' => 'admin.show-order']);
	Route::post('/orders/{id}/tailor',   ['uses' => 'AdminController@tailor',      'as' => 'tailor-message']);
	Route::post('/orders/{id}/confirm',  ['uses' => 'AdminController@confirm',     'as' => 'admin.confirm-order']);
	Route::post('/orders/{id}/tracking', ['uses' => 'AdminController@tracking',    'as' => 'tracking-number']);
});

// API endpoints for managing the session from JavaScript
//-------------------------------------------------------------------------
Route::get('session',                            ['uses' => 'SessionsController@index',    'as' => 'session.index']);
Route::post('session',                           ['uses' => 'SessionsController@store',    'as' => 'session.store']);
Route::get('session/{key}',                      ['uses' => 'SessionsController@show',     'as' => 'session.show']);
Route::delete('session/{key}',                   ['uses' => 'SessionsController@destroy',  'as' => 'session.destroy']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);