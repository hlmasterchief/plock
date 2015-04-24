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
}