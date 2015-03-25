<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthenticationController extends Controller {

	/**
	 * Inject User model
	 * @var \App\User
	 */
	protected $user;

	/**
	 * Inject View factory
	 * @var \Illuminate\View\Factory
	 */
	protected $view;

	/**
	 * Inject Auth manager
	 * @var \Illuminate\Auth\AuthManager
	 */
	protected $auth;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(\App\User $user,
								\Illuminate\View\Factory $view,
								\Illuminate\Auth\AuthManager $auth) {
		$this->user = $user;
		$this->view = $view;
		$this->auth = $auth;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Display login form
	 *
	 * @return Response
	 */
	public function getLogin() {
		return $this->view->make('authentication.login');
	}

	/**
	 * Authentication attempt
	 *
	 * @return Response
	 */
	public function postLogin(\App\Http\Requests\LoginRequest $request) {
		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials)) {
			return redirect('/');
		} else {
			return redirect()->action('AuthenticationController@getLogin')
								->withInput($request->only('email'))
								->with('flash_message', trans('authentication.not_matched'));
		}
	}

	/**
	 * Logout
	 *
	 * @return Response
	 */
	public function getLogout() {
		$this->auth->logout();
		return redirect()->back();
	}

}
