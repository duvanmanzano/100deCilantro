<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppreciationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appreciation', function (Blueprint $table) {
            $table->bigIncrements('id_appreciation');
            $table->unsignedBigInteger('id_movie');
            $table->unsignedBigInteger('id_user');
            $table->double('value',3,1);
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_movie')->references('id_movies')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appreciation');
    }
}
