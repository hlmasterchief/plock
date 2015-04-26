<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BoxController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\Contracts\Repositories\BoxRepositoryInterface $box,
                                \Illuminate\Auth\AuthManager $auth,
                                \Illuminate\View\Factory $view) {
        $this->box = $box;
        $this->auth = $auth;
        $this->view = $view;

        // $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Display box
     *
     * @return Response
     */
    public function getRead($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BoxController@getUpdate')
                                ->with('flash_message', trans('box.not_valid'));
        }

        $box = $this->box->find($id);
        if (is_null($box)) {
            return redirect()->action('BoxController@getUpdate')
                                ->with('flash_message', trans('box.not_found'));
        }

        $header = [
            'title' => $box->title,
            'sub-title' => $box->user()->first()->username,
            'username' => $this->auth->user()->username
        ];

        return $this->view->make('box.read')->with('header', $header)
                                            ->with('box', $box);
    }

    /**
     * Display create box form
     *
     * @return Response
     */
    public function getCreate() {
        return $this->view->make('box.create');
    }

    /**
     * Save box
     *
     * @return Response
     */
    public function postCreate(\App\Http\Requests\BoxRequest $request) {
        $id = $this->auth->user()->id;

        $box = $this->box->create($id, $request->all());

        return redirect()->action('BoxController@getRead', array($box->id))
                            ->with('flash_message', trans('box.add_success'));
    }

    /**
     * Display update box form
     *
     * @return Response
     */
    public function getUpdate($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BoxController@getUpdate')
                                ->with('flash_message', trans('box.not_valid'));
        }

        $box = $this->box->find($id);
        if (is_null($box)) {
            return redirect()->action('BoxController@getUpdate')
                                ->with('flash_message', trans('box.not_found'));
        }

        return $this->view->make('box.update')->with('box', $box);
    }

    /**
     * Update box
     *
     * @return Response
     */
    public function postUpdate($id = null, \App\Http\Requests\BoxRequest $request) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BoxController@getUpdate')
                                ->with('flash_message', trans('box.not_valid'));
        }

        $box = $this->box->find($id);
        if (is_null($box)) {
            return redirect()->action('BoxController@getUpdate')
                                ->with('flash_message', trans('box.not_found'));
        }
        
        $this->box->update($id, $request->only('name', 'type'));

        return redirect()->action('BoxController@getUpdate')
                            ->with('flash_message', trans('box.update_success'));
    }

    /**
     * Display delete box form
     *
     * @return Response
     */
    public function getdelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BoxController@getDelete')
                                ->with('flash_message', trans('box.not_valid'));
        }

        $box = $this->box->find($id);
        if (is_null($box)) {
            return redirect()->action('BoxController@getDelete')
                                ->with('flash_message', trans('box.not_found'));
        }

        return $this->view->make('box.delete')->with('box', $box);
    }

    /**
     * Delete box
     *
     * @return Response
     */
    public function postDelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('BoxController@getDelete')
                                ->with('flash_message', trans('box.not_valid'));
        }

        $box = $this->box->find($id);
        if (is_null($box)) {
            return redirect()->action('BoxController@getDelete')
                                ->with('flash_message', trans('box.not_found'));
        }
        
        $this->box->delete($id);

        return redirect()->action('BoxController@getDelete')
                            ->with('flash_message', trans('box.delete_success'));
    }
}
