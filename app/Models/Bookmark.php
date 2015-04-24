<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {

    /**
     * Set table for model
     * @var string
     */
    protected $table = 'bookmarks';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = ['description'];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['id', 'user_id', 'favourite_id'];

    /**
     * Get relationship - Favourite
     * @return App\Favourite
     */
    public function favourite() {
        return $this->belongsTo('App\Models\Favourite');
    }

    /**
     * Get relationship - User
     * @return App\User
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
