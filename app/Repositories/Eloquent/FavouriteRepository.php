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
     * Get Favourite by Id
     * @param  int $id
     * @return App\Models\Favourite
     */
    public function find($id) {
        return $this->favourite->find($id);
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

    /**
     * Update Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function update($id, array $modifiers) {
        $favourite = $this->find($id);

        if ($modifiers['name']) {
            $favourite->name = $modifiers['name'];
        }

        if ($modifiers['type']) {
            $favourite->type = $modifiers['type'];
        }

        $favourite->save();

        return $favourite;
    }

    /**
     * Delete Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function delete($id) {
        $favourite = $this->find($id);

        return $favourite->delete();
    }
}