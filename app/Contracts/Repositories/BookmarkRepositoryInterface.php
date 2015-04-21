<?php namespace App\Contracts\Repositories;

interface BookmarkRepositoryInterface {
    /**
     * Get Bookmark by Id
     * @param  int $id
     * @return App\Models\Bookmark
     */
    public function find($id);

    /**
     * Store Bookmark in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function create($user_id, array $modifiers);

    /**
     * Update Bookmark in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function update($id, array $modifiers);

    /**
     * Delete Bookmark in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function delete($id);
}