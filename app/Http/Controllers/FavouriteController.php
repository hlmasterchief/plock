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
     * Display favourite
     *
     * @return Response
     */
    public function getFavourite() {
        return $this->view->make('favourite');
    }

    /**
     * Save favourite
     *
     * @return Response
     */
    public function postFavourite(\App\Http\Requests\FavouriteRequest $request) {
        $this->favourite->create($request->all());

        return redirect()->action('FavouriteController@getFavourite')
                            ->with('flash_message', trans('favourite.add_success'));
    }
}
