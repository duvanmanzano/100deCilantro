<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = "id_schedule";
    protected $table = "schedule";

    public $timestamps = false;

    protected $fillable = [
        'id_schedule', 'id_movies', 'schedule'
    ];
}
