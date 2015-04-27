<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    /**
     * Inject User eloquent
     * @param \App\Models\User $user
     * @param \App\Models\Profile $profile
     */
    public function __construct(\App\Models\User $user,
                                \App\Models\Profile $profile,
                                \App\Models\Follower $follower) {
        $this->user = $user;
        $this->profile = $profile;
        $this->follower = $follower;
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
        $profile_credentials = array_only($modifiers, ['display_name']);
        $profile = $this->profile->create($profile_credentials);
        $user->profile()->save($profile);

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
        $profile = $this->find($id)->profile;

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

    /**
     * Update Profile avatar in Database
     * @param  array  $modifiers
     * @return App\Models\Profile
     */
    public function updateAvatar($id, array $modifiers) {
        $profile = $this->find($id);

        $destination = public_path() . "/upload-avatar";
        $filename    = md5(time());
        $random      = rand(11111,99999);
        $extension   = $modifiers->getClientOriginalExtension();

        $modifiers->move($destination, $filename.$random.".".$extension);

        $profile->avatar = $modifiers->getRealPath();

        $profile->save();

        return $profile;
    }

    /**
     * Update Profile cover in Database
     * @param  array  $modifiers
     * @return App\Models\Profile
     */
    public function updateCover($id, array $modifiers) {
        $profile = $this->find($id);

        $destination = public_path() . "/upload-cover";
        $filename    = md5(time());
        $random      = rand(11111,99999);
        $extension   = $modifiers->getClientOriginalExtension();

        $modifiers->move($destination, $filename.$random.".".$extension);

        $profile->cover = $modifiers->getRealPath();

        $profile->save();

        return $profile;
    }

    /**
     * Toggle follow user
     * @param  int $follower_id
     * @param  int $followee_id
     * @return boolean isFollow
     */
    public function toggleFollow($follower_id, $followee_id) {
        $follower = $this->find($follower_id);
        $followee = $this->find($followee_id);

        if (is_null($follower) || is_null($followee)) {
            return false;
        }

        $follow = $this->follower->where('user_id', '=', $follower_id)
                                    ->where('follow_id', '=', $followee_id)
                                    ->first();

        // if follow then set to unfollow
        if ($follow) {
            $follower->following()->detach($followee_id);
            return false;
        }

        $follower->following()->attach($followee_id);
        return true;
    }

    /**
     * Get user's followers
     * @param  int $id
     * @return Collection[\App\Models\User]
     */
    public function getFollowers($id) {
        return $this->find($id)->followers();
    }

    /**
     * Get user's followings
     * @param  int $id
     * @return Collection[\App\Models\User]
     */
    public function getFollowings($id) {
        return $this->find($id)->following();
    }

    /**
     * Get user's boxes
     * @param  int $id
     * @return Collection[\App\Models\User]
     */
    public function getBoxes($id) {
        return $this->find($id)->boxes();
    }

    /**
     * Get user's bookmarks
     * @param  int $id
     * @return Collection[\App\Models\User]
     */
    public function getBookmarks($id) {
        return $this->find($id)->bookmarks();
    }
}