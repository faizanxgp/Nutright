<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Lead;
use App\Affiliate;
use App\Coupon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Session;

class OrderController extends Controller {
	public function getOrders() {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$orderStatus = config('variables.orderStatus');
		$orders = Order::orderBy('id', 'desc')->paginate(20);
		
		return view('admin.orders', ['user' => $user, 'orders' => $orders, 'orderStatus' => $orderStatus]);
	}
	
	public function getOrderEdit($id) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$orderStatus = config('variables.orderStatus');
		
		$order = Order::find($id);
		return view('admin.order-edit', ['user' => $user, 'order' => $order, 'orderStatus' => $orderStatus]);
		
	}
	
	public function postOrderEdit(Request $request) {
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$id = $request->id;
		
		$order = Order::find($id);
		
		$order->first_name = $request->first_name;
		$order->last_name = $request->last_name;
		$order->email = $request->email;
		$order->phone = $request->phone;
		$order->address1 = $request->address1;
		$order->address2 = $request->address2;
		$order->city = $request->city;
		$order->state = $request->state;
		$order->zip_code = $request->zip_code;
		$order->country = $request->country;
		$order->product = $request->product;
		$order->package = $request->package;
		$order->qty = $request->qty;
		$order->amount = $request->amount;
		$order->shipping = $request->shipping;
		$order->discount = $request->discount;
		$order->order_amount = $request->order_amount;
		
		$order->coupon = $request->coupon;
		$order->status = $request->status;
		$order->notes = $request->notes;
		
		$order->update();
		
		Session::flash('flash_message', 'Order updated');
		
		return redirect()->route('order-edit', $id);
		
	}
	
	public function getOrderDelete($id) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$order = Order::find($id);
		
	}
	
	public function postOrdersSearch(Request $request) {
		$user = Auth::user();
//        $name = $request['name'];
//        $email = $request['email'];
//        $phone = $request['phone'];
//        $package = $request['package'];
		
		$orderStatus = config('variables.orderStatus');
		
		$orders = Order::where('id', '>', 0);
		
		if ($request->name) {
			$orders->where('first_name', 'LIKE', '%' . $request->name . '%');
		}
		if ($request->email) {
			$orders->where('email', $request->email);
		}
		if ($request->phone) {
			$orders->where('phone', $request->phone);
		}
		
		if ($request->package) {
			$orders->where('package', $request->package);
		}
		
		//\DB::enableQueryLog();
		$orders = $orders->orderBy('id', 'desc')->paginate(20);
		
		//dump(\DB::getQueryLog());
		
		//dump($orders);
		
		return view('admin.orders', ['user' => $user, 'orders' => $orders, 'orderStatus' => $orderStatus]);
	}
	
	public function getLeads() {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$orderStatus = config('variables.orderStatus');
		$leads = Lead::orderBy('id', 'desc')->paginate(20);
		
		return view('admin.leads', ['user' => $user, 'leads' => $leads, 'orderStatus' => $orderStatus]);
	}
	
	public function getLeadEdit($id) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$orderStatus = config('variables.orderStatus');
		
		$lead = Lead::find($id);
		return view('admin.lead-edit', ['user' => $user, 'lead' => $lead, 'orderStatus' => $orderStatus]);
		
	}
	
	public function postLeadEdit(Request $request) {
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$id = $request->id;
		
		$lead = Lead::find($id);
		
		$lead->first_name = $request->first_name;
		$lead->last_name = $request->last_name;
		$lead->email = $request->email;
		$lead->phone = $request->phone;
		$lead->address1 = $request->address1;
		$lead->address2 = $request->address2;
		$lead->city = $request->city;
		$lead->state = $request->state;
		$lead->zip_code = $request->zip_code;
		$lead->country = $request->country;
		$lead->product = $request->product;
		$lead->package = $request->package;
		$lead->qty = $request->qty;
		$lead->amount = $request->amount;
		$lead->shipping = $request->shipping;
		$lead->coupon = $request->coupon;
		$lead->status = $request->status;
		$lead->notes = $request->notes;
		
		$lead->update();
		
		Session::flash('flash_message', 'Lead updated');
		
		return redirect()->route('lead-edit', $id);
		
	}
	
	public function getLeadDelete($id) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$lead = Lead::find($id);
		
	}
	
	public function getCoupons() {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$orderStatus = config('variables.orderStatus');
		$coupons = Coupon::orderBy('id', 'desc')->paginate(20);
		
		return view('admin.coupons', ['user' => $user, 'coupons' => $coupons, 'orderStatus' => $orderStatus]);
	}
	
	public function getCouponEdit($id) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$users = User::where('access_level', 1)->pluck('name', 'id');
		
		$couponStatus = config('variables.couponStatus');
		
		$coupon = Coupon::find($id);
		return view('admin.coupon-edit', ['user' => $user, 'coupon' => $coupon, 'users' => $users, 'couponStatus' => $couponStatus]);
		
	}
	
	public function getCouponAdd() {
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$users = User::where('access_level', 1)->pluck('name', 'id');
		
		$couponStatus = config('variables.couponStatus');
		
		$coupon = new Coupon();
		return view('admin.coupon-edit', ['user' => $user, 'coupon' => $coupon, 'users' => $users, 'couponStatus' => $couponStatus]);
		
	}
	
	public function postCouponEdit(Request $request) {
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$id = $request->id;
		
		if ($id == 0 or $id == "") {
			$coupon = new Coupon();
			
			$coupon->buyer_discount = (int)$request->buyer_discount;
			$coupon->affiliate_discount = (int)$request->affiliate_discount;
			$coupon->shipping = (int)$request->shipping;
			$coupon->package1 = (isset($request->package1) ? 1 : 0);
			$coupon->package2 = (isset($request->package2) ? 1 : 0);
			$coupon->package3 = (isset($request->package3) ? 1 : 0);
			$coupon->coupon = $request->coupon;
			$coupon->active = (isset($request->active) ? 1 : 0);
			$coupon->user_id = $request->user_id;
			
			$coupon->save();
			
			$id = $coupon->id;
			
		} else {
			$coupon = Coupon::find($id);
			
			$coupon->buyer_discount = $request->buyer_discount;
			$coupon->affiliate_discount = $request->affiliate_discount;
			$coupon->shipping = $request->shipping;
			$coupon->package1 = (isset($request->package1) ? 1 : 0);
			$coupon->package2 = (isset($request->package2) ? 1 : 0);
			$coupon->package3 = (isset($request->package3) ? 1 : 0);
			$coupon->coupon = $request->coupon;
			$coupon->active = (isset($request->active) ? 1 : 0);
			$coupon->user_id = $request->user_id;
			
			$coupon->update();
		}
		
		Session::flash('flash_message', 'Coupon updated');
		
		return redirect()->route('coupon-edit', $id);
		
	}
	
	public function getCouponDelete($id) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$coupon = Coupon::find($id);
		
	}
	
	public function getAffOrders() {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level != 1) // only for admin and manager
			return view('home');
		
		$affiliate = Affiliate::where('user_id', $user->id)->first();
		if ($affiliate == null) $affkey = ""; else
			$affkey = $affiliate->aff_key;
		
		//echo $affkey;
		
		$orders = Order::where('affiliate', $affkey)->orderBy('id', 'desc')->paginate(20);
		
		return view('admin.my-orders', ['user' => $user, 'orders' => $orders]);
	}
	
}