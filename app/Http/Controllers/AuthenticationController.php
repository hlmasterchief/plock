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
    public function __construct(\App\Contracts\Repositories\UserRepositoryInterface $user,
                                \Illuminate\Auth\AuthManager $auth,
                                \Illuminate\View\Factory $view) {
        $this->user = $user;
        $this->auth = $auth;
        $this->view = $view;

        // $this->middleware('guest', ['except' => ['getLogout', 'getUpdate', 'postUpdate']]);
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
            //return redirect()->back();
            return redirect()->action('AuthenticationController@getUpdate')
                                ->with('flash_message', trans('authentication.login_success'));
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
        $this->user->create($request->all());

        return redirect()->action('AuthenticationController@getLogin')
                            ->with('flash_message', trans('authentication.signup_success'));
    }

    /**
     * Display update form
     *
     * @return Response
     */
    public function getUpdate() {
        return $this->view->make('authentication.update')->with('email', $this->auth->user()->email);
    }

    /**
     * Update user
     *
     * @return Response
     */
    public function postUpdate(\App\Http\Requests\UpdateRequest $request) {
        $user = $this->auth->user();

        $credentials = [
            'username' => $user->username,
            'password' => $request['old_password']
        ];

        if ($this->auth->validate($credentials)) {
            $this->user->update($user->id, $request->only('email', 'password'));

            return redirect()->action('AuthenticationController@getUpdate')
                                ->with('flash_message', trans('authentication.update_success'));
        }

        return redirect()->action('AuthenticationController@getUpdate')
                                ->withInput($request->only('email'))
                                ->with('flash_message', trans('authentication.not_matched'));
    }
}
