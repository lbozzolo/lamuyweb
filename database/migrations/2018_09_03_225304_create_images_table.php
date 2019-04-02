<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('path');
            $table->string('title')->nullable();
            $table->integer('thumbnail_id')->nullable();
            $table->integer('imageable_id')->nullable();
            $table->string('imageable_type')->nullable();
            $table->integer('main')->nullable();
            $table->integer('type')->nullable();

            $table->index('id');
            $table->index('imageable_id');

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
        Schema::drop('images');
    }
}
