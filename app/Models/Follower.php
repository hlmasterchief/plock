<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model {

    /**
     * Set table for model
     * @var string
     */
    protected $table = 'followers';

    /**
     * Mass assignment allow
     * @var array[string]
     */
    protected $fillable = [];

    /**
     * Properties not allowed for mass assignment
     * @var array[string]
     */
    protected $guarded = ['user_id', 'follow_id'];

}
