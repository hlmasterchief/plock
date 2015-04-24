<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FollowerController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\Contracts\Repositories\FollowerRepositoryInterface $follower,
                                \App\Contracts\Repositories\UserRepositoryInterface $user,
                                \Illuminate\Auth\AuthManager $auth,
                                \Illuminate\View\Factory $view) {
        $this->follower = $follower;
        $this->user = $user;
        $this->auth = $auth;
        $this->view = $view;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Display list of users following us
     *
     * @return Response
     */
    public function getFollower() {
        $user = $this->user->find(Auth::id());
        $followers = $user->follower();

        return $this->view->make('follower.follower')->with('followers' => $followers);
    }

    /**
     * Display list of users we are following
     *
     * @return Response
     */
    public function getFollowing() {
        $user = $this->user->find(Auth::id());
        $followers = $user->following();

        return $this->view->make('follower.following')->with('followers' => $followers);
    }

    /**
     * Display follow form
     *
     * @return Response
     */
    public function getCreate($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FollowerController@getCreate')
                                ->with('flash_message', trans('follower.not_valid'));
        }

        $follower = $this->user->find($id);
        if (is_null($follower)) {
            return redirect()->action('FollowerController@getCreate')
                                ->with('flash_message', trans('follower.not_found'));
        }

        return $this->view->make('follower.create')->with('follower' => $follower);
    }

    /**
     * Save follow
     *
     * @return Response
     */
    public function postCreate($id = null, \App\Http\Requests\FollowerRequest $request) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FollowerController@getCreate')
                                ->with('flash_message', trans('follower.not_valid'));
        }

        $follower = $this->user->find($id);
        if (is_null($follower)) {
            return redirect()->action('FollowerController@getCreate')
                                ->with('flash_message', trans('follower.not_found'));
        }

        $this->follower->create(Auth::id(), $id);

        return redirect()->action('FollowerController@getCreate')
                            ->with('flash_message', trans('follower.add_success'));
    }

    /**
     * Display delete follow form
     *
     * @return Response
     */
    public function getdelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FollowerController@getDelete')
                                ->with('flash_message', trans('follower.not_valid'));
        }

        $follower = $this->user->find($id);
        if (is_null($follower)) {
            return redirect()->action('FollowerController@getDelete')
                                ->with('flash_message', trans('follower.not_found'));
        }

        return $this->view->make('follower.delete')->with('follower' => $follower);
    }

    /**
     * Delete follow
     *
     * @return Response
     */
    public function postDelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FollowerController@getDelete')
                                ->with('flash_message', trans('follower.not_valid'));
        }

        $follower = $this->user->find($id);
        if (is_null($follower)) {
            return redirect()->action('FollowerController@getDelete')
                                ->with('flash_message', trans('follower.not_found'));
        }
        
        $this->follower->delete(Auth::id(), $id);

        return redirect()->action('FollowerController@getDelete')
                            ->with('flash_message', trans('follower.delete_success'));
    }
}
