<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    //

    protected $primaryKey = "id_appreciation";
    protected $table = "appreciation";

    public $timestamps = false;

    protected $fillable = [
        'id_appreciation', 'id_movie', 'id_user', 'value'
    ];
}
