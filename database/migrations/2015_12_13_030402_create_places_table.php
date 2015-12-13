<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function(Blueprint $table) {
            $table->increments('id');

            $table->string('lat');
            $table->string('lng');
            $table->string('elevation')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('webpage')->nullable();

            $table->integer('category_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('places');
    }
}
