<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract {

    use Authenticatable;

    /**
     * Set table for model
     * @var string
     */
	protected $table = 'users';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = ['username', 'email'];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['id', 'password'];

    /**
     * Properties not allowed to be shown in array or JSON
     * @var array[string]
     */
    protected $hidden  = ['password'];

    /**
     * Get relationship - Profile
     * @return App\Profile
     */
    public function profile() {
        return $this->hasOne('App\Models\Profile');
    }

    // Get users following us
    public function followers() {
        return $this->belongsToMany('App\Models\User', 'followers', 'follow_id', 'user_id');
    }

    // Get users we are following
    public function following() {
        return $this->belongsToMany('App\Models\User', 'followers', 'user_id', 'follow_id');
    }

    // Check follow
    public function isFollow($id) {
        return $this->following->contains($id);
    }

    /**
     * Get relationship - Box
     * @return App\Box
     */
    public function boxes() {
        return $this->hasMany('App\Models\Box');
    }
}
