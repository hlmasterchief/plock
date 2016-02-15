<?php namespace App\Contracts\Repositories;

interface BoxRepositoryInterface {
    /**
     * Get Box by Id
     * @param  int $id
     * @return App\Models\Box
     */
    public function find($id);

    /**
     * Store Box in Database
     * @param  int    $user_id
     * @param  array  $modifiers
     * @return App\Models\Box
     */
    public function create($user_id, array $modifiers);

    /**
     * Update Box in Database
     * @param  int    $id
     * @param  array  $modifiers
     * @return App\Models\Box
     */
    public function update($id, array $modifiers);

    /**
     * Delete Box in Database
     * @param  int $id
     * @return App\Models\Box
     */
    public function delete($id);

}