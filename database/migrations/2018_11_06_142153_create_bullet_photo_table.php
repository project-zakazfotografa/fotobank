<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulletPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bullet_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('bullet_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('bullet_id')->references('id')->on('bullets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bullet_photo');
    }
}
