<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthenticationController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\User $user,
                                \Illuminate\Auth\AuthManager $auth,
                                \Illuminate\View\Factory $view) {
        $this->user = $user;
        $this->auth = $auth;
        $this->view = $view;

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
        $credentials = $request->only('username', 'password');

        if ($this->auth->attempt($credentials)) {
            return redirect()->back();
        } else {
            return redirect()->action('AuthenticationController@getLogin')
                                ->withInput($request->only('username'))
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
        return redirect()->action('AuthenticationController@getLogin')
                            ->with('flash_message', trans('authentication.logout_success'));
    }

    /**
     * Display signup form
     *
     * @return Response
     */
    public function getSignup() {
        return $this->view->make('authentication.signup');
    }

    /**
     * Save user
     *
     * @return Response
     */
    public function postSignup(\App\Http\Requests\SignupRequest $request) {
        $credentials = $request->only('username', 'email');

        $user = $this->user->create($credentials);
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->action('AuthenticationController@getLogin')
                            ->with('flash_message', trans('authentication.signup_success'));
    }
}
