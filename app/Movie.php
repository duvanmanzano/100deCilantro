<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $primaryKey = "id_movies";
    protected $table = "movies";

    public $timestamps = false;

    protected $fillable = [
        'id_movies', 'name', 'picture', 'max_num', 'price'
    ];
}
