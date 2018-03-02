<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrateActorMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('actor_movie', function (Blueprint $table) {
		    $table->unsignedInteger('actor_id');
		    $table->foreign('actor_id')->references('id')->on('actors');
		    $table->unsignedInteger('movie_id');
		    $table->foreign('movie_id')->references('id')->on('movies');
		   
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('actor_movie');
    }
}
