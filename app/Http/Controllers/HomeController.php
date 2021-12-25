<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $user = Auth::user();
	
	    if ($user == null) {
		    return view('auth.login');
	    } else {
		    return view('home');
	    }
    }
}
