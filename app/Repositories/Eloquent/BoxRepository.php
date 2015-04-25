<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\BoxRepositoryInterface;

class BoxRepository implements BoxRepositoryInterface {

    /**
     * Inject Box eloquent
     * @param \App\Models\Box $box
     */
    public function __construct(\App\Models\Box $box) {
        $this->box = $box;
    }

    /**
     * Get Box by Id
     * @param  int $id
     * @return App\Models\Box
     */
    public function find($id) {
        return $this->box->find($id);
    }

    /**
     * Store Box in Database
     * @param  array  $modifiers
     * @return App\Models\Box
     */
    public function create($user_id, array $modifiers) {
        $data = array_only($modifiers, ['title', 'description']);

        $box = $this->box->create($data);
        $box->user_id = $user_id;
        $box->save();

        return $box;
    }

    /**
     * Update Box in Database
     * @param  array  $modifiers
     * @return App\Models\Box
     */
    public function update($id, array $modifiers) {
        $box = $this->find($id);

        if ($modifiers['title']) {
            $box->title = $modifiers['title'];
        }

        if ($modifiers['description']) {
            $box->description = $modifiers['description'];
        }

        $box->save();

        return $box;
    }

    /**
     * Delete Box in Database
     * @param  array  $modifiers
     * @return App\Models\Box
     */
    public function delete($id) {
        $box = $this->find($id);

        return $box->delete();
    }
}