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

    /**
     * Upload avatar form
     *
     * @return Response
     */
    public function getAvatar() {
        return $this->view->make('user.updateAvatar');
    }

    /**
     * Save avatar
     *
     * @return Response
     */
    public function postAvatar(\App\Http\Requests\AvatarRequest $request) {
        $this->user->updateAvatar(Auth::id(), $request->file('image'));

        return redirect()->action('UserController@getAvatar')
                    ->with('flash_message', trans('user.updateAvatar_success'));
    }

    /**
     * Upload cover form
     *
     * @return Response
     */
    public function getCover() {
        return $this->view->make('user.updateCover');
    }

    /**
     * Save cover
     *
     * @return Response
     */
    public function postCover(\App\Http\Requests\CoverRequest $request) {
        $this->user->updateCover(Auth::id(), $request->file('image'));

        return redirect()->action('UserController@getCover')
                    ->with('flash_message', trans('user.updateCover_success'));
    }

    /**
     * Toggle follower
     *
     * @return Response
     */
    public function postToggleFollow(\App\Http\Requests\FollowRequest $request) {
        $follower_id = $request->input('follower_id');
        $followee_id = $request->input('followee_id');

        $is_follow = $this->user->toggleFollow($follower_id, $followee_id);

        return response()->json(['is_follow' => $is_follow]);
    }

    /**
     * Get user's followers
     * @param  int $id
     * @return Response
     */
    public function getFollowers($id = null) {
        if (is_null($id)) {
            $id = $this->auth->user()->id;
        }

        $user = $this->user->find($id);
        if (is_null($user)) {
            return redirect('/')->with('flash_message', trans('user.not_found'));
        }

        $followers = $this->user->getFollowers($id);

        return $this->view->make('user.followers')
                            ->with('followers', $followers);
    }

    /**
     * Get user's followings
     * @param  int $id
     * @return Response
     */
    public function getFollowings($id = null) {
        if (is_null($id)) {
            $id = $this->auth->user()->id;
        }

        $user = $this->user->find($id);
        if (is_null($user)) {
            return redirect('/')->with('flash_message', trans('user.not_found'));
        }

        $followings = $this->user->getFollowings($id);

        return $this->view->make('user.followings')
                            ->with('followings', $followings);
    }

    /**
     * Get user's followers by name
     * @param  string $username
     * @return Response
     */
    public function getFollowersByName($username) {
        $user = $this->user->findByColumn('username', $username);
        if (is_null($user)) {
            return redirect('/')->with('flash_message', trans('user.not_found'));
        }

        $followers = $this->user->getFollowers($user['id']);

        return $this->view->make('user.followers')
                            ->with('followers', $followers);
    }

    /**
     * Get user's followings by name
     * @param  string $username
     * @return Response
     */
    public function getFollowingsByName($username) {
        $user = $this->user->findByColumn('username', $username);
        if (is_null($user)) {
            return redirect('/')->with('flash_message', trans('user.not_found'));
        }

        $followers = $this->user->getFollowings($user['id']);

        return $this->view->make('user.followings')
                            ->with('followings', $followings);
    }

    /**
     * Get user's boxes
     * @param  int $id
     * @return Response
     */
    public function getBoxes($id = null) {
        if (is_null($id)) {
            $id = $this->auth->user()->id;
        }

        $user = $this->user->find($id);
        if (is_null($user)) {
            return redirect('/')->with('flash_message', trans('user.not_found'));
        }

        $boxes = $this->user->getBoxes($id);

        return $this->view->make('user.boxes')
                            ->with('boxes', $boxes);
    }

    /**
     * Get user's boxes by name
     * @param  string $username
     * @return Response
     */
    public function getBoxesByName($username) {
        $user = $this->user->findByColumn('username', $username);
        if (is_null($user)) {
            return redirect('/')->with('flash_message', trans('user.not_found'));
        }

        //$boxes = $this->user->getBoxesByName($username);
        $boxes = $this->user->getBoxes($user['id']);

        return $this->view->make('user.boxes')
                            ->with('boxes', $boxes);
    }
}
