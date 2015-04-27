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
    protected $fillable = ['genre', 'country', 'director', 'plot', 'year'];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['favourite_id'];

    /**
     * Key collection for elasticsearch index
     * @var array[string]
     */
    protected $index = ['plot'];

    /**
     * Append json data
     * @var array[string]
     */
    protected $appends = ['short_data'];

    /**
     * Polymorphic relation
     * @return App\Models\Favourite
     */
    public function favourite() {
        return $this->belongsTo('App\Models\Favourite');
    }

    public function getData() {
        return ["Genre" => $this->genre,
                "Country" => $this->country,
                "Director" => $this->director,
                "Year" => $this->year];
    }

    public function getShortDataAttribute() {
        return [
            "name"          => $this->favourite->name,
            "description"   => $this->plot
        ];
    }

}
