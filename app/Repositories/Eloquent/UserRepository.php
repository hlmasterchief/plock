<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    /**
     * Inject User eloquent
     * @param \App\Models\User $user
     * @param \App\Models\Profile $profile
     */
    public function __construct(\App\Models\User $user,
                                \App\Models\Profile $profile) {
        $this->user = $user;
        $this->profile = $profile;
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

        //create profile
        $user->profile->create($user->id);

        return $user;
    }

    /**
     * Update User in Database
     * @param  array  $modifiers
     * @return App\Models\User
     */
    public function update($id, array $modifiers) {
        $user = $this->find($id);

        if ($modifiers['email']) {
            $user->email = $modifiers['email'];
        }

        if ($modifiers['password']) {
            $user->password = bcrypt($modifiers['password']);
        }

        $user->save();

        return $user;
    }

    /**
     * Update Profile in Database
     * @param  array  $modifiers
     * @return App\Models\Profile
     */
    public function updateProfile($id, array $modifiers) {
        $profile = $this->find($id);

        if ($modifiers['display_name']) {
            $profile->display_name = $modifiers['display_name'];
        }

        if ($modifiers['location']) {
            $profile->location = $modifiers['location'];
        }

        if ($modifiers['homepage']) {
            $profile->homepage = $modifiers['homepage'];
        }

        if ($modifiers['description']) {
            $profile->description = $modifiers['description'];
        }

        $profile->save();

        return $profile;
    }
}