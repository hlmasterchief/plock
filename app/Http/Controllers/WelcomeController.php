<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	// set route for sample basic view
	public function user()
	{
		return view('template.profile');
	}

	public function box()
	{
		return view('template.box');
	}

	public function boxs_list()
	{
		return view('template.boxs-list');
	}

	public function posts_list() {
		return view('template.posts-list');
	}

	public function profile() {
		return view('template.profile');
	}


}
