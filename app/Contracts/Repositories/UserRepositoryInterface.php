<?php namespace App\Contracts\Repositories;

interface UserRepositoryInterface {
    /**
     * Get User by Id
     * @param  int $id
     * @return App\Models\User
     */
    public function find($id);

    /**
     * Get User by Column
     * @param  string $col
     * @param  mixes  $value
     * @return App\Models\User
     */
    public function findByColumn($col, $value);

    /**
     * Store User in Database
     * @param  array  $modifiers
     * @return App\Models\User
     */
    public function create(array $modifiers);

    /**
     * Update User in Database
     * @param  array  $modifiers
     * @return App\Models\User
     */
    public function update($id, array $modifiers);

    /**
     * Update Profile in Database
     * @param  array  $modifiers
     * @return App\Models\Profile
     */
    public function updateProfile($id, array $modifiers);

    /**
     * Update Profile avatar in Database
     * @param  array  $modifiers
     * @return App\Models\Profile
     */
    public function updateAvatar($id, array $modifiers);

    /**
     * Update Profile cover in Database
     * @param  array  $modifiers
     * @return App\Models\Profile
     */
    public function updateCover($id, array $modifiers);

    /**
     * Toggle follow user in Database
     * @param  int $follower_id
     * @param  int $followee_id
     * @return App\Models\User
     */
    public function toggleFollow($follower_id, $followee_id);

    /**
     * Get user's followers in Database
     * @param  int $id
     * @return App\Models\User
     */
    public function getFollowers($id);

    /**
     * Get user's followings in Database
     * @param  int $id
     * @return App\Models\User
     */
    public function getFollowings($id);

    /**
     * Get user's boxes in Database
     * @param  array  $modifiers
     * @return App\Models\Box
     */
    public function getBoxes($id);

    /**
     * Get user's bookmarks in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function getBookmarks($id);
}