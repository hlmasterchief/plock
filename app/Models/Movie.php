<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends IndexModel {

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
     * Key collection for elasticsearch index
     * @var array[string]
     */
    protected $index = ['plot'];

    /**
     * Polymorphic relation
     * @return App\Models\Favourite
     */
    public function favourite() {
        return $this->belongsTo('App\Models\Favourite');
    }

}
