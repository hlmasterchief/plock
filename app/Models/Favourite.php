<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends App\Models\IndexModel {

    /**
     * Set table for model
     * @var string
     */
    protected $table = 'favourites';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = ['name', 'type'];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['id'];

    /**
     * Get relationship - Bookmark
     * @return App\Bookmark
     */
    public function bookmarks() {
        return $this->hasMany('App\Models\Bookmark');
    }

    /**
     * Get relationship - Movie
     * @return App\Movie
     */
    public function movie() {
        return $this->hasOne('App\Models\Movie');
    }

}
