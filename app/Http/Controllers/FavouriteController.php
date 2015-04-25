<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FavouriteController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\Contracts\Repositories\FavouriteRepositoryInterface $favourite,
                                \Illuminate\Auth\AuthManager $auth,
                                \Illuminate\View\Factory $view) {
        $this->favourite = $favourite;
        $this->auth = $auth;
        $this->view = $view;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Display create favourite form
     *
     * @return Response
     */
    public function getCreate() {
        return $this->view->make('favourite.create');
    }

    /**
     * Save favourite
     *
     * @return Response
     */
    public function postCreate(\App\Http\Requests\FavouriteRequest $request) {
        $this->favourite->create($request->all());

        return redirect()->action('FavouriteController@getCreate')
                            ->with('flash_message', trans('favourite.add_success'));
    }

    /**
     * Display update favourite form
     *
     * @return Response
     */
    public function getUpdate($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FavouriteController@getUpdate')
                                ->with('flash_message', trans('favourite.not_valid'));
        }

        $favourite = $this->favourite->find($id);
        if (is_null($favourite)) {
            return redirect()->action('FavouriteController@getUpdate')
                                ->with('flash_message', trans('favourite.not_found'));
        }

        return $this->view->make('favourite.update')->with('favourite', $favourite);
    }

    /**
     * Update favourite
     *
     * @return Response
     */
    public function postUpdate($id = null, \App\Http\Requests\FavouriteRequest $request) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FavouriteController@getUpdate')
                                ->with('flash_message', trans('favourite.not_valid'));
        }

        $favourite = $this->favourite->find($id);
        if (is_null($favourite)) {
            return redirect()->action('FavouriteController@getUpdate')
                                ->with('flash_message', trans('favourite.not_found'));
        }

        $this->favourite->update($id, $request->all());

        return redirect()->action('FavouriteController@getUpdate')
                            ->with('flash_message', trans('favourite.update_success'));
    }

    /**
     * Display delete favourite form
     *
     * @return Response
     */
    public function getdelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FavouriteController@getDelete')
                                ->with('flash_message', trans('favourite.not_valid'));
        }

        $favourite = $this->favourite->find($id);
        if (is_null($favourite)) {
            return redirect()->action('FavouriteController@getDelete')
                                ->with('flash_message', trans('favourite.not_found'));
        }

        return $this->view->make('favourite.delete')->with('favourite', $favourite);
    }

    /**
     * Delete favourite
     *
     * @return Response
     */
    public function postDelete($id = null) {
        if (!isset($id) or is_null($id)) {
            return redirect()->action('FavouriteController@getDelete')
                                ->with('flash_message', trans('favourite.not_valid'));
        }

        $favourite = $this->favourite->find($id);
        if (is_null($favourite)) {
            return redirect()->action('FavouriteController@getDelete')
                                ->with('flash_message', trans('favourite.not_found'));
        }

        $this->favourite->delete($id);

        return redirect()->action('FavouriteController@getDelete')
                            ->with('flash_message', trans('favourite.delete_success'));
    }

    /**
     * Search for favourites
     * @param  \App\Http\Requests\FavouriteRequest $request
     * @return Response
     */
    public function postSearch(\App\Http\Requests\FavouriteRequest $request) {
        $favourites = $this->favourite->search($request->all());

        return $this->view->make('favourite.search_result')->with('favourites', $favourites);
    }
}
