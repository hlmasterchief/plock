<?php namespace App\Models;

class Movie extends RedisModel {

    protected $root = "plock";
    protected $type = "movies";

    protected $index = ["title"];
    protected $cast  = [
        "id"    =>  "integer",
        "title" =>  "string"
    ];

}
