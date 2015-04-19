<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\FavouriteRepositoryInterface;

class FavouriteRepository implements FavouriteRepositoryInterface {

    /**
     * Inject Favourite eloquent
     * @param \App\Models\Favourite $favourite
     */
    public function __construct(\App\Models\Favourite $favourite) {
        $this->favourite = $favourite;
    }

    /**
     * Store Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function create(array $modifiers) {
        $data = array_only($modifiers, ['name', 'type']);

        $favourite = $this->favourite->create($data);
        $favourite->save();

        return $favourite;
    }
}