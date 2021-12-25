<?php

use App\Lead;
use App\Order;
use App\Coupon;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('sample-restful-apis', function()
{
	return array(
			1 => "expertphp",
			2 => "demo"
	);
});

Route::post('post-lead', function (Request $request)
{
	$data=$request->all();
	
	$lead = new Lead();
	
	$lead->first_name = (isset($data['first_name']) ? $data['first_name'] : '');
	$lead->last_name  = (isset($data['last_name']) ? $data['last_name'] : '');
	$lead->email      = (isset($data['email']) ? $data['email'] : '');
	$lead->phone      = (isset($data['phone']) ? $data['phone'] : '');
	$lead->address1   = (isset($data['address1']) ? $data['address1'] : '');
	$lead->address2   = (isset($data['address2']) ? $data['address2'] : '');
	$lead->city       = (isset($data['city']) ? $data['city'] : '');
	$lead->state      = (isset($data['state']) ? $data['state'] : '');
	$lead->zip_code   = (isset($data['zip_code']) ? $data['zip_code'] : '');
	$lead->country    = (isset($data['country']) ? $data['country'] : '');
	$lead->affiliate  = (isset($data['affiliate']) ? $data['affiliate'] : '');
	
  $lead->save();
	
	$lead_id = $lead->id;
	
	return response(array(
			'error' => true,
			'message' =>'Order created successfully',
			'id' => $lead_id
	),200);
});


Route::post('post-order', function (Request $request)
{
	$data=$request->all();
	
//	if (isset($data['id'])) {
//		$id = $data['id'];
//		$order = Order::find($id);
//	} else {
		$order = new Order();
//	}
	$order->first_name = (isset($data['first_name']) ? $data['first_name'] : '');
	$order->last_name  = (isset($data['last_name']) ? $data['last_name'] : '');
	$order->email      = (isset($data['email']) ? $data['email'] : '');
	$order->phone      = (isset($data['phone']) ? $data['phone'] : '');
	$order->address1   = (isset($data['address1']) ? $data['address1'] : '');
	$order->address2   = (isset($data['address2']) ? $data['address2'] : '');
	$order->city       = (isset($data['city']) ? $data['city'] : '');
	$order->state      = (isset($data['state']) ? $data['state'] : '');
	$order->zip_code   = (isset($data['zip_code']) ? $data['zip_code'] : '');
	$order->country    = (isset($data['country']) ? $data['country'] : '');
	$order->affiliate  = (isset($data['affiliate']) ? $data['affiliate'] : '');
	$order->product    = (isset($data['product']) ? $data['product'] : '');
	$order->package    = (isset($data['package']) ? $data['package'] : '');
	$order->coupon     = (isset($data['coupon']) ? $data['coupon'] : '');
	$order->amount     = (isset($data['amount']) ? $data['amount'] : '');
	$order->shipping   = (isset($data['shipping']) ? $data['shipping'] : '');
	$order->discount   = (isset($data['discount']) ? $data['discount'] : '');
	$order->order_amount = (isset($data['order_amt']) ? $data['order_amt'] : '');
	
	$order->qty        = (isset($data['qty']) ? $data['qty'] : '1');
	
	$order->save();
	
	return response(array(
			'error' => true,
			'message' =>'Order created successfully'
	),200);
});

Route::get('get-coupon/{coupon}', function($couponid) {
	//$data=$request->all();
	$couponcode = (isset($couponid) ? $couponid : '');
	$coupon = Coupon::where('coupon', $couponcode)->where('active', 1)->first();
	
	$data = "['aa' => 'bb', 'cc' => 'dd']";
	
	if ($coupon == null) {
		return response(array(
				'error' => true,
				'message' =>'Coupon not found',
				'data' => []
		),200);
	} else {
		return response(array(
				'error' => false,
				'message' =>'Coupon is active',
				'data' => $coupon
		),200);
	}
});

Route::get('get-coupons', function() {
	//$data=$request->all();
	
	$coupons = Coupon::where('active', 1)->get();
	
	if ($coupons == null) {
		return response(array(
				'error' => true,
				'message' =>'Coupons not found',
				'data' => []
		),200);
	} else {
		return response(array(
				'error' => false,
				'message' =>'Coupon is active',
				'data' => $coupons
		),200);
	}
});