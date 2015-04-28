<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\Contracts\Repositories\CommentRepositoryInterface $comment,
                                \App\Contracts\Repositories\BookmarkRepositoryInterface $bookmark,
                                \Illuminate\Auth\AuthManager $auth,
                                \Illuminate\View\Factory $view) {
        $this->comment = $comment;
        $this->bookmark = $bookmark;
        $this->auth = $auth;
        $this->view = $view;

        // $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Display create comment form
     *
     * @return Response
     */
    public function getCreate() {
        return $this->view->make('comment.create');
    }

    /**
     * Save comment
     *
     * @return Response
     */
    public function postCreate(\App\Http\Requests\CommentRequest $request) {
        $bookmark_id = $request->only('bookmark_id');

        if (!isset($bookmark_id) or is_null($bookmark_id)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                             ->with('flash_message', trans('bookmark.not_valid'));
        }
        $bookmark = $this->bookmark->find($bookmark_id);
        if (is_null($bookmark)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                              >with('flash_message', trans('bookmark.not_found'));
        }

        $id = $this->auth->user()->id;
        $comment = $this->comment->create($id, $request->all());

        return redirect()->action('BookmarkController@getRead', array($comment->bookmark_id))
                          ->with('flash_message', trans('comment.add_success'));
    }

    /**
     * Display update comment form
     *
     * @return Response
     */
    public function getUpdate($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('comment.not_valid'));
        }

        $comment = $this->comment->find($id);
        if (is_null($comment)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('comment.not_found'));
        }

        return $this->view->make('comment.update')->with('comment', $comment);
    }

    /**
     * Update comment
     *
     * @return Response
     */
    public function postUpdate($id = null, \App\Http\Requests\CommentRequest $request) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('comment.not_valid'));
        }

        $comment = $this->comment->find($id);
        if (is_null($comment)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('comment.not_found'));
        }
        
        $this->comment->update($id, $request->only('content'));

        return redirect()->action('BookmarkController@getRead', array($comment->bookmark_id))
                            ->with('flash_message', trans('comment.update_success'));
    }

    /**
     * Display delete comment form
     *
     * @return Response
     */
    public function getdelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('CommentController@getDelete')
                                ->with('flash_message', trans('comment.not_valid'));
        }

        $comment = $this->comment->find($id);
        if (is_null($comment)) {
            return redirect()->action('CommentController@getDelete')
                                ->with('flash_message', trans('comment.not_found'));
        }

        return $this->view->make('comment.delete')->with('comment', $comment);
    }

    /**
     * Delete comment
     *
     * @return Response
     */
    public function postDelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('comment.not_valid'));
        }

        $comment = $this->comment->find($id);
        if (is_null($comment)) {
            return redirect()->action('BookmarkController@getNewsFeed')
                                ->with('flash_message', trans('comment.not_found'));
        }
        
        $this->comment->delete($id);

        return redirect()->action('BookmarkController@getNewsFeed')
                            ->with('flash_message', trans('comment.delete_success'));
    }
}
