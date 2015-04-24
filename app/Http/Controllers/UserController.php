<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

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

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Display update form
     *
     * @return Response
     */
    public function getUpdate() {
        return $this->view->make('user.update');
    }

    /**
     * Update profile
     *
     * @return Response
     */
    public function postUpdate(\App\Http\Requests\UpdateRequest $request) {
        $this->user->updateProfile(Auth::id(), $request->all());

        return redirect()->action('UserController@getUpdate')
                    ->with('flash_message', trans('user.update_success'));
    }
}
