<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BookmarkController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\Contracts\Repositories\BookmarkRepositoryInterface $bookmark,
                                \App\Contracts\Repositories\FavouriteRepositoryInterface $favourite,
                                \Illuminate\Auth\AuthManager $auth,
                                \Illuminate\View\Factory $view) {
        $this->bookmark = $bookmark;
        $this->favourite = $favourite;
        $this->auth = $auth;
        $this->view = $view;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Display create bookmark form
     *
     * @return Response
     */
    public function getCreate() {
        return $this->view->make('bookmark.create');
    }

    /**
     * Save bookmark
     *
     * @return Response
     */
    public function postCreate(\App\Http\Requests\BookmarkRequest $request) {
        $favourite_id = $request->only('favourite_id');

        if (!isset($favourite_id) or is_null($favourite_id)) {
            return redirect()->action('BookmarkController@getUpdate')
                                ->with('flash_message', trans('favourite.not_valid'));
        }
        $favourite = $this->favourite->find($favourite_id);
        if (is_null($favourite)) {
            return redirect()->action('BookmarkController@getUpdate')
                                ->with('flash_message', trans('favourite.not_found'));
        }

        $this->bookmark->create(Auth::id(), $request->all());

        return redirect()->action('BookmarkController@getCreate')
                            ->with('flash_message', trans('bookmark.add_success'));
    }

    /**
     * Display update bookmark form
     *
     * @return Response
     */
    public function getUpdate($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BookmarkController@getUpdate')
                                ->with('flash_message', trans('bookmark.not_valid'));
        }

        $bookmark = $this->bookmark->find($id);
        if (is_null($bookmark)) {
            return redirect()->action('BookmarkController@getUpdate')
                                ->with('flash_message', trans('bookmark.not_found'));
        }

        return $this->view->make('bookmark.update')->with('bookmark' => $bookmark);
    }

    /**
     * Update bookmark
     *
     * @return Response
     */
    public function postUpdate($id = null, \App\Http\Requests\BookmarkRequest $request) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BookmarkController@getUpdate')
                                ->with('flash_message', trans('bookmark.not_valid'));
        }

        $bookmark = $this->bookmark->find($id);
        if (is_null($bookmark)) {
            return redirect()->action('BookmarkController@getUpdate')
                                ->with('flash_message', trans('bookmark.not_found'));
        }
        
        $this->bookmark->update($id, $request->only('description'));

        return redirect()->action('BookmarkController@getUpdate')
                            ->with('flash_message', trans('bookmark.update_success'));
    }

    /**
     * Display delete bookmark form
     *
     * @return Response
     */
    public function getdelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BookmarkController@getDelete')
                                ->with('flash_message', trans('bookmark.not_valid'));
        }

        $bookmark = $this->bookmark->find($id);
        if (is_null($bookmark)) {
            return redirect()->action('BookmarkController@getDelete')
                                ->with('flash_message', trans('bookmark.not_found'));
        }

        return $this->view->make('bookmark.delete')->with('bookmark' => $bookmark);
    }

    /**
     * Delete bookmark
     *
     * @return Response
     */
    public function postDelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BookmarkController@getDelete')
                                ->with('flash_message', trans('bookmark.not_valid'));
        }

        $bookmark = $this->bookmark->find($id);
        if (is_null($bookmark)) {
            return redirect()->action('BookmarkController@getDelete')
                                ->with('flash_message', trans('bookmark.not_found'));
        }
        
        $this->bookmark->delete($id);

        return redirect()->action('BookmarkController@getDelete')
                            ->with('flash_message', trans('bookmark.delete_success'));
    }
}