<?php

namespace App\Http\Controllers;

use App\User;
use App\Affiliate;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Session;

use Mail;

class UserController extends Controller {
	
	public function getHome() {
		
		$user = Auth::user();
		
		if ($user == null) {
			return view('auth.login');
		} else {
			return view('home', ['user' => $user]);
		}
	}
	
	public function getLoginPage() {
		
		return view('auth.login');
	}
	
	public function postSignup(Request $request) {
		// create the validation rules ------------------------
		$rules = array('name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required', 'password_confirmation' => 'required|same:password',);
		
		// do the validation ----------------------------------
		// validate against the inputs from our form
		$validator = Validator::make($request->all(), $rules);
		
		// check if the validator failed -----------------------
		if ($validator->fails()) {
			
			// get the error messages from the validator
			//$messages = $validator->messages();
			
			// redirect our user back to the form with the errors from the validator
			return Redirect::to('account')->withErrors($validator)->withInput();
			
		} else {
			$email = $request['email'];
			$name = $request['name'];
			
			$password = bcrypt($request['password']);
			
			$user = new User();
			$user->email = $email;
			$user->name = $name;
			
			$user->password = $password;
			
			$user->save();
			
			// login user
			Auth::login($user);
			
			return redirect()->route('home');
			
		}
	}
	
	public function postLogin(Request $request) {
		$remember = isset($request['remember']) ? 1 : 0;
		$email = trim($request['email']);
		$passwd = trim($request['password']);
		
		if ($email == "" OR $passwd == "") {
			return redirect()->back()->withInput();
		}
		
		if (Auth::attempt(['email' => $email, 'password' => $passwd], $remember)) {
			
			$user = Auth::user();
			
			return redirect()->route('home');
			
		} else {
			Session::flash('flash_message', 'Invalid Email, Suite or Password.');
			return redirect()->back()->withInput();
		}
	}
	
	public function getLogout() {
		Auth::logout();
		return redirect()->route('home');
		
	}
	
	public function postForgot(Request $request) {
	}
	
	public function getUsers() {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 3) // only for admin and manager
			return view('home');
		
		$userStatus = config('variables.userStatus');
		
		$users = User::orderBy('id', 'desc')->paginate(20);
		
		return view('admin.users', ['user' => $user, 'users' => $users, 'userStatus' => $userStatus]);
		
	}
	
	public function getUserEdit($id) {
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 3) // only for admin and manager
			return view('home');
		
		$userStatus = config('variables.userStatus');
		
		$member = User::find($id);
		return view('admin.user-edit', ['user' => $user, 'member' => $member, 'userStatus' => $userStatus]);
	}
	
	public function postUserEdit(Request $request) {
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 3) // only for admin and manager
			return view('home');
		
		$id = $request['id'];
		$member = User::find($id);
		$member->name = $request['name'];
		$member->email = $request['email'];
		$member->access_level = $request['access_level'];
		if ($request['password'] != "") $member->password = bcrypt($request['password']);
		
		$member->update();
		
		Session::flash('flash_message', 'User updated');
		
		return redirect()->route('user-edit', $id);
		
	}
	
	public function getUserDelete($id) {
		$user = Auth::user();
		
		if ($user == null) {
			return view('auth.login');
			
		}
	}
	
	public function getProfile() {
		$user = Auth::user();

		if ($user == null) {
			return view('auth.login');
		}
			$id = $user->id;
			
			$member = User::find($id);
			
			return view('profile-edit', ['user' => $user, 'member' => $member]);
		
	}
	
	public function postProfile(Request $request) {
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 1) // only for admin and manager and affiliates
			return view('home');
		
		$id = $request['id'];
		$member = User::find($id);
		$member->name = $request['name'];
		$member->email = $request['email'];
		
		if ($request['password'] != "") $member->password = bcrypt($request['password']);
		
		$member->update();
		
		Session::flash('flash_message', 'Profile updated');
		
		return redirect()->route('profile-edit');
		
	}
	
	public function getAffiliate($id) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$orderStatus = config('variables.orderStatus');
		
		$affiliate = Affiliate::where('user_id', $id)->first();
		if ($affiliate == null) {
			$affiliate = new Affiliate();
			$affiliate->user_id = $id;
			$affiliate->save();
		}
		
		$member = User::find($id);
		
		return view('affiliate-edit', ['user' => $user, 'affiliate' => $affiliate, 'member' => $member]);
		
	}
	
	public function postAffiliate(Request $request) {
		
		$user = Auth::user();
		
		if ($user == null) return view('auth.login'); else if ($user->access_level < 2) // only for admin and manager
			return view('home');
		
		$id = $request['id'];
		
		$affiliate = Affiliate::find($id);
		$affiliate->address1 = $request['address1'];
		$affiliate->address2 = $request['address2'];
		$affiliate->city = $request['city'];
		$affiliate->state = $request['state'];
		$affiliate->zip_code = $request['zip_code'];
		$affiliate->country = $request['country'];
		$affiliate->phone = $request['phone'];
		$affiliate->aff_key = $request['aff_key'];
		
		$affiliate->update();
		
		Session::flash('flash_message', 'Affiliate updated');
		
		return redirect()->route('affiliate-edit', $request->user_id);
		
	}
	
	public function sendEmail($data)
	{
		$title = $data['title'];
		$contents = $data['contents'];
		$email = $data['email'];
		$emailTo = $data['emailTo'];
				
//		Mail::send('emails.basic', ['user' => $user], function ($m) use ($data) {
//			$m->from('admin@nutright.com', 'Admin');
//			$m->to($user->email, $user->name)->subject('Your Reminder!');
//		});
		
		Mail::send('emails.basic', ['title' => $title, 'content' => $contents], function ($m) use ($email, $emailTo, $title) {
			$m->from('admin@theshopship.com', 'TheShopShip');
			$m->to($email, $emailTo)->subject($title);
		});
		
	}
	
	public function test() {
		$this->sendEmail(['title' => 'email title', 'contents' =>
		'email contents', 'email' => 'aalogic@gmail.com', 'emailTo' => 'Ayaz']);
	}
}









