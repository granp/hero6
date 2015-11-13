<?php

Route::get('/', function () {
	var_dump(getenv('CF_STAGING_TIMEOUT'));
    return view('welcome');
});
Route::get('/home', function () {
    return redirect()
    	->route('dashboard');
});

// Authentication routes...
Route::get('auth/login', ['as'=>'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('logout', array('as'=>'logout','uses' => 'Auth\AuthController@getLogout'));

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers(['password' => 'Auth\PasswordController',]);

//============================================================================
//route get
// Route::get('dashboard', ['as'=>'dashboard','middleware' => 'auth','uses' => 'DashboardController@create']);
Route::get('dashboard', [
	'as'=>'dashboard',
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'DashboardController@create',
	'roles' => ['administrator','manager'] // Only an administrator, or a manager can access this route
]);

//get
Route::get('become/client', ['as'=>'becomeClient', 'uses' => 'BecomeClientController@create']);
Route::get('client/register/{id}', ['as'=>'registerClient', 'uses' => 'RegisterClientController@show']);
Route::get('admin/vercode/client/{id}', ['as'=>'sendVerCode','middleware' => ['auth', 'roles'], 'uses' => 'BecomeClientController@sendConfirmationLink', 'roles' => ['administrator','manager','root']]);
Route::get('book', ['as'=>'book','middleware' => ['auth', 'roles'], 'uses' => 'BookingController@create', 'roles' => ['administrator','manager']]);
Route::get('book/seat/{id}', ['as'=>'bookSeat','middleware' => ['auth', 'roles'], 'uses' => 'SeatBookingController@show', 'roles' => ['administrator','manager']]);
Route::get('checkout/bookdetails/{id}', ['as'=>'checkoutBooked','middleware' => ['auth', 'roles'], 'uses' => 'CheckoutController@store', 'roles' => ['administrator','manager']]);
// Route::get('book/{id}', ['as' => 'bookBusType', 'middleware' => ['auth', 'roles'], 'uses' => 'BookingController@show','roles' => ['administrator','manager']]);
Route::get('route', ['as'=>'route','middleware' => 'auth','uses' => 'RouteCitiesController@create']);
Route::get('route/new/course', ['as'=>'addroute','middleware' => ['auth', 'roles'], 'uses' => 'RouteCitiesController@showRoute', 'roles' => ['administrator','manager']]);
Route::get('bus', ['as'=>'buses','middleware' => ['auth', 'roles'], 'uses' => 'BusController@create', 'roles' => ['administrator','manager']]);
Route::get('bus/new/bustype', ['as'=>'addbustype','middleware' => 'auth','uses' => 'BusController@showBusType']);
Route::get('buses/{id}/profile', ['as' => 'bustypeprofile', 'middleware' => ['auth', 'roles'], 'uses' => 'BusTypeProfileController@show','roles' => ['administrator','manager']]);
Route::get('/bus/seat/map/{id}', ['as'=>'busseatmap', 'middleware'=>['auth','roles'], 'uses'=> 'BusSeatMapController@show', 'roles'=>['administrator','manager']]);
Route::get('admin/edit/profile', ['as'=>'editprofile','middleware' => ['auth', 'roles'], 'uses' => 'EditProfileController@create', 'roles' => ['administrator','manager']]);
Route::get('admin/route', ['as'=>'routes','middleware' => ['auth', 'roles'], 'uses' => 'RouteCitiesController@create', 'roles' => ['administrator','manager','root']]);

//post
Route::post('become/client', ['as'=>'becomeClient', 'uses' => 'BecomeClientController@store']);
Route::post('route/new/course', ['as'=>'addroute','middleware' => ['auth', 'roles'], 'uses' => 'RouteCitiesController@storeRoute', 'roles' => ['administrator','manager']]);
Route::post('bus/new/bustype', ['as'=>'addBusType','middleware' => ['auth', 'roles'], 'uses' => 'BusController@storeBusType', 'roles' => ['administrator','manager']]);
Route::post('/bus/seat/map/{id}', ['as'=>'updateBusProfile', 'middleware'=>['auth','roles'], 'uses'=> 'BusTypeProfileController@update', 'roles'=>['administrator','manager']]);
Route::post('/book/seat/{id}', ['as'=>'insertBookSeat', 'middleware'=>['auth','roles'], 'uses'=> 'SeatBookingController@store', 'roles'=>['administrator','manager']]);
Route::post('checkout/payment', ['as'=>'paymentcheckout','middleware' => ['auth', 'roles'], 'uses' => 'CheckoutController@store', 'roles' => ['administrator','manager']]);


##root route
Route::get('root/client/invite', ['as'=>'inviteClient','middleware' => ['auth', 'roles'], 
		'uses' => 'root\InviteClientController@create',	'roles' => ['root']]);
Route::post('root/client/invite', ['as'=>'inviteClient','middleware' => ['auth', 'roles'], 
		'uses' => 'root\InviteClientController@store',	'roles' => ['root']]);

Route::get('root/city/new', ['as'=>'addcity','middleware' => ['auth', 'roles'], 
		'uses' => 'CityController@create',	'roles' => ['root']]);
Route::post('root/city/new', ['as'=>'addcity','middleware' => ['auth', 'roles'], 
		'uses' => 'CityController@store',	'roles' => ['root']]);