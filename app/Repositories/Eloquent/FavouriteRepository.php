<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\FavouriteRepositoryInterface;

class FavouriteRepository implements FavouriteRepositoryInterface {

    /**
     * Inject Favourite eloquent
     * @param \App\Models\Favourite $favourite
     */
    public function __construct(\App\Models\Favourite $favourite,
                                \App\Models\Movie $movie) {
        $this->favourite = $favourite;
        $this->movie = $movie;
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
        $type = "";

        switch ($modifiers['type']) {
            case 'movies':
                $type = "movie";
                break;
            default:
                return null;
        }

        $data = array_only($modifiers, ['name', 'type']);
        $favourite = $this->favourite->create($data);
        $favourite->save();

        $data = array_except($modifiers, ['name', 'type']);
        $params = $this->$type->create($data);
        $params->favourite()->associate($this->favourite->find($favourite->id));
        $params->save();

        $params->favourite->save();

        return $favourite;
    }

    /**
     * Update Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function update($id, array $modifiers) {
        $favourite = $this->find($id);
        $params    = $favourite->data;

        if ($modifiers['name']) {
            $favourite->name = $modifiers['name'];
        }

        if ($modifiers['type']) {
            $favourite->type = $modifiers['type'];
        }

        $data = array_except($modifiers, ['name', 'type']);

        foreach ($data as $key => $value) {
            $params->$key = $value;
        }

        $favourite->save();

        $params->save();

        return $favourite;
    }

    /**
     * Delete Favourite in Database
     * @param  array  $modifiers
     * @return App\Models\Favourite
     */
    public function delete($id) {
        $favourite = $this->find($id);
        $favourite->data->delete();

        return $favourite->delete();
    }
}