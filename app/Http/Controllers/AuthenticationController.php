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
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(\App\User $user, \Illuminate\View\Factory $view) {
		$this->user = $user;
		$this->view = $view;
	}

	/**
	 * Display login form
	 *
	 * @return Response
	 */
	public function getLogin() {
		return $this->view->make('authentication.login');
	}

	public function postLogin() {

	}

}
