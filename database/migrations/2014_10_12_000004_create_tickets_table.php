<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id_tickets');
            $table->unsignedBigInteger('id_movie');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_schedule');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_movie')->references('id_movies')->on('movies');
            $table->foreign('id_schedule')->references('id_schedule')->on('schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
