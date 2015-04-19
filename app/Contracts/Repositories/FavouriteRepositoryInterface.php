<?php namespace App\Contracts\Repositories;

interface FavouriteRepositoryInterface {
    /**
     * Store Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function create(array $modifiers);
}