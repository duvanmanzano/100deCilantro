<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = "id_tickets";
    protected $table = "tickets";

    public $timestamps = false;

    protected $fillable = [
        'id_tickets', 'id_movie', 'id_user'
    ];
}
