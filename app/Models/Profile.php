<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	/**
     * Set table for model
     * @var string
     */
    protected $table = 'profiles';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = ['display_name', 'location', 'homepage', 'description'];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['user_id'];

    /**
     * Get relationship - User
     * @return App\User
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
