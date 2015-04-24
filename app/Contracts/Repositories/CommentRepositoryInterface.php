<?php namespace App\Contracts\Repositories;

interface CommentRepositoryInterface {
    /**
     * Get Comment by Id
     * @param  int $id
     * @return App\Models\Comment
     */
    public function find($id);

    /**
     * Store Comment in Database
     * @param  array  $modifiers
     * @return App\Models\Comment
     */
    public function create($user_id, array $modifiers);

    /**
     * Update Comment in Database
     * @param  array  $modifiers
     * @return App\Models\Comment
     */
    public function update($id, array $modifiers);

    /**
     * Delete Comment in Database
     * @param  array  $modifiers
     * @return App\Models\Comment
     */
    public function delete($id);
}