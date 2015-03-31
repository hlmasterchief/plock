<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    /**
     * Inject User eloquent
     * @param \App\Models\User $user
     */
    public function __construct(\App\Models\User $user) {
        $this->user = $user;
    }

    /**
     * Get User by Id
     * @param  int $id
     * @return App\Models\User
     */
    public function find($id) {
        return $this->user->find($id);
    }

    /**
     * Get User by query columns
     * @param  array $modifiers
     * @return App\Models\User
     */
    public function findByColumn($col, $value) {
        return $this->user->where($col, '=',$value)->first();
    }

    /**
     * Store User in Database
     * @param  array  $modifiers
     * @return App\Models\User
     */
    public function create(array $modifiers) {
        $credentials = array_only($modifiers, ['username', 'email']);

        $user = $this->user->create($credentials);
        $user->password = bcrypt($modifiers['password']);
        $user->save();

        return $user;
    }

    /**
     * Update User in Database
     * @param  array  $modifiers
     * @return App\Models\User
     */
    public function update(array $modifiers) {

    }
}