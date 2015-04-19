<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {

    /**
     * Set table for model
     * @var string
     */
    protected $table = 'movies';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = ['plot', 'release_date'];

    /**
     * Get relationship - Favourite
     * @return App\Favourite
     */
    public function favourite() {
        return $this->belongsTo('App\Models\Favourite');
    }

}
