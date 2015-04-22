<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends IndexModel {

    /**
     * Set table for model
     * @var string
     */
    protected $table = 'favourites';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = ['name'];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['id', 'type'];

    /**
     * Key collection for elasticsearch index
     * @var array[string]
     */
    protected $index = ['id', 'name'];

    /**
     * Help for getting elastic type
     * @return mixed
     */
    public function getElasticType() {
        return $this->type;
    }

    /**
     * Get relationship - Bookmark
     * @return App\Bookmark
     */
    public function bookmarks() {
        return $this->hasMany('App\Models\Bookmark');
    }

    /**
     * Get data based on type
     * @return App\Models\$this->type
     */
    public function data() {
        $type = $this->type;
        return $this->$type();
    }

    /**
     * Movie relation
     * @return App\Models\Movie
     */
    public function movies() {
        return $this->hasOne('App\Models\Movie');
    }

}
