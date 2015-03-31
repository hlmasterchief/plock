<?php namespace App\Contracts\Repositories;

interface UserRepositoryInterface {
    /**
     * Get User by Id
     * @param  int $id
     * @return App\Models\User
     */
    public function getUserById($id);

    /**
     * Get User by Column
     * @param  string $col
     * @param  mixes  $value
     * @return App\Models\User
     */
    public function getUserByColumn($col, $value);

    /**
     * Store User in Database
     * @param  array  $modifiers
     * @return App\Models\User
     */
    public function storeUser(array $modifiers);
}