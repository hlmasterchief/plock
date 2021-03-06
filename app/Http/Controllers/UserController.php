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
    }

    /**
     * Display update form
     *
     * @return Response
     */
    public function getUpdate() {
        $profile = $this->auth->user()->profile;
        return $this->view->make('user.update')->with('profile', $profile);;
    }

    /**
     * Update profile
     *
     * @return Response
     */
    public function postUpdate(\App\Http\Requests\UserRequest $request) {
        $user_id = $this->auth->user()->id;
        $this->user->updateProfile($user_id, $request->all());

        if ($request->hasFile('avatar'))
        {
            $this->user->updateAvatar($user_id, $request->file('avatar'));
        }
        if ($request->hasFile('cover'))
        {
            $this->user->updateCover($user_id, $request->file('cover'));
        }

        return redirect()->action('UserController@getUpdate')
                    ->with('flash_message', trans('user.update_success'));
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

        // return response()->json(['is_follow' => $is_follow]);
        return redirect()->back();
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
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $followers = $this->user->getFollowers($id);

        return $this->view->make('user.followers')
                            ->with('user', $user)
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
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $followings = $this->user->getFollowings($id);

        return $this->view->make('user.followings')
                            ->with('user', $user)
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
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $followers = $this->user->getFollowers($user['id']);

        return $this->view->make('user.followers')
                            ->with('user', $user)
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
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $followings = $this->user->getFollowings($user['id']);

        return $this->view->make('user.followings')
                            ->with('user', $user)
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
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $boxes = $this->user->getBoxes($id)->get();

        return $this->view->make('user.boxes')
                          ->with('user', $user)
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
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $boxes = $this->user->getBoxes($user['id'])->get();

        return $this->view->make('user.boxes')
                          ->with('user', $user)
                          ->with('boxes', $boxes);
    }

    /**
     * Get user's bookmarks
     * @param  int $id
     * @return Response
     */
    public function getBookmarks($id = null) {
        if (is_null($id)) {
            $id = $this->auth->user()->id;
        }

        $user = $this->user->find($id);
        if (is_null($user)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $bookmarks = $this->user->getBookmarks($id)->get();

        return $this->view->make('user.bookmarks')
                          ->with('user', $user)
                          ->with('bookmarks', $bookmarks);
    }

    /**
     * Get user's bookmarks by name
     * @param  string $username
     * @return Response
     */
    public function getBookmarksByName($username) {
        $user = $this->user->findByColumn('username', $username);
        if (is_null($user)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('user.not_found'));
        }

        $bookmarks = $this->user->getBookmarks($user['id'])->get();

        return $this->view->make('user.bookmarks')
                          ->with('user', $user)
                          ->with('bookmarks', $bookmarks);
    }
}
