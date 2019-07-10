<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderImagesMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_images_messages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('slider_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->string('main_text')->nullable();
            $table->string('secondary_text')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_images_messages');
    }
}
