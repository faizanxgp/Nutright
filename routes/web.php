<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group([], function () {
	
	Route::get('/', ['uses' => 'UserController@getHome', 'as' => 'dashboard']);

//Auth::routes();
	
	Route::get('/home', ['uses' => 'UserController@getHome', 'as' => 'home']);
	
	/* General */
	Route::get('/account', ['uses' => 'UserController@getLoginPage', 'as' => 'account']);
	
	Route::get('/login', ['uses' => 'UserController@getLoginPage', 'as' => 'login']);
	
	Route::post('/signup', ['uses' => 'UserController@postSignUp', 'as' => 'signup']);
	
	Route::post('/login', ['uses' => 'UserController@postLogin', 'as' => 'login']);
	
	Route::get('/forgot/{token?}', ['uses' => 'UserController@getForgotPage', 'as' => 'forgot']);
	
	Route::post('/forgot', ['uses' => 'UserController@postSendResetLink', 'as' => 'forgot']);
	
	Route::post('/password-reset', ['uses' => 'UserController@postPasswordReset', 'as' => 'password-reset']);
	
	Route::get('/logout', ['uses' => 'UserController@getLogout', 'as' => 'logout']);
	
	
	
	Route::get('/orders', ['uses' => 'OrderController@getOrders', 'as' => 'orders', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/order/edit/{id}', ['uses' => 'OrderController@getOrderEdit', 'as' => 'order-edit', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::post('/order/edit', ['uses' => 'OrderController@postOrderEdit', 'as' => 'order-update', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/order/delete/{id}', ['uses' => 'OrderController@getOrderDelete', 'as' => 'order-delete', 'middleware' => 'roles', 'roles' => [3, 2]]);
	
	Route::post('/orders-search', ['uses' => 'OrderController@postOrdersSearch', 'as' => 'orders-search', 'middleware' => 'roles', 'roles' => [3, 2]]);
	
	Route::get('/leads', ['uses' => 'OrderController@getLeads', 'as' => 'leads', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/lead/edit/{id}', ['uses' => 'OrderController@getLeadEdit', 'as' => 'lead-edit', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::post('/lead/edit', ['uses' => 'OrderController@postLeadEdit', 'as' => 'lead-update', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/lead/delete/{id}', ['uses' => 'OrderController@getLeadDelete', 'as' => 'lead-delete', 'middleware' => 'roles', 'roles' => [3, 2]]);
	
	Route::get('/coupons', ['uses' => 'OrderController@getCoupons', 'as' => 'coupons', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/coupon/add', ['uses' => 'OrderController@getCouponAdd', 'as' => 'coupon-add', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/coupon/edit/{id}', ['uses' => 'OrderController@getCouponEdit', 'as' => 'coupon-edit', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::post('/coupon/edit', ['uses' => 'OrderController@postCouponEdit', 'as' => 'coupon-update', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/coupon/delete/{id}', ['uses' => 'OrderController@getCouponDelete', 'as' => 'coupon-delete', 'middleware' => 'roles', 'roles' => [3, 2]]);
	
	Route::get('/my-orders', ['uses' => 'OrderController@getAffOrders', 'as' => 'my-orders']);
	
	Route::get('/users', ['uses' => 'UserController@getUsers', 'as' => 'users', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/user/edit/{id}', ['uses' => 'UserController@getUserEdit', 'as' => 'user-edit', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::post('/user/edit', ['uses' => 'UserController@postUserEdit', 'as' => 'user-update', 'middleware' => 'roles', 'roles' => [3, 2]]);
	Route::get('/user/delete/{id}', ['uses' => 'UserController@getUserDelete', 'as' => 'user-delete', 'middleware' => 'roles', 'roles' => [3, 2]]);
	
	Route::get('/profile', ['uses' => 'UserController@getProfile', 'as' => 'profile-edit']);
	Route::post('/profile', ['uses' => 'UserController@postProfile', 'as' => 'profile-update']);
	
	Route::get('/affiliate/{id}', ['uses' => 'UserController@getAffiliate', 'as' => 'affiliate-edit']);
	Route::post('/affiliate', ['uses' => 'UserController@postAffiliate', 'as' => 'affiliate-update']);
	
	Route::get('/test', ['uses' => 'UserController@test', 'as' => 'test']);
	
});