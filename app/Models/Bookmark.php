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
    protected $guarded = ['id', 'user_id', 'favourite_id', 'box_id'];

    /**
     * Get relationship - Favourite
     * @return App\Favourite
     */
    public function favourite() {
        return $this->belongsTo('App\Models\Favourite');
    }

    /**
     * Get relationship - Comment
     * @return App\Comment
     */
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Get relationship - User
     * @return App\User
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get relationship - Box
     * @return App\Box
     */
    public function box() {
        return $this->belongsTo('App\Models\Box');
    }

}
