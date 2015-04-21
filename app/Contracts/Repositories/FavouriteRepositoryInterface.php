<?php namespace App\Contracts\Repositories;

interface FavouriteRepositoryInterface {
    /**
     * Get Favourite by Id
     * @param  int $id
     * @return App\Models\Favourite
     */
    public function find($id);

    /**
     * Store Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function create(array $modifiers);

    /**
     * Update Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function update($id, array $modifiers);

    /**
     * Delete Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function delete($id);
}