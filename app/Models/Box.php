<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model {

    /**
     * Set table for model
     * @var string
     */
    protected $table = 'boxes';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = ['title', 'description'];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['id', 'user_id'];

    /**
     * Get relationship - User
     * @return App\User
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get relationship - Bookmark
     * @return App\Bookmark
     */
    public function bookmarks() {
        return $this->hasMany('App\Models\Bookmark');
    }

}
