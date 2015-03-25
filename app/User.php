<?php namespace App;

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

}
