<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('content');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('textpost_id')->nullable();
            $table->unsignedInteger('picture_id')->nullable();
            $table->unsignedInteger('video_id')->nullable();





            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('textpost_id')->references('id')->on('textposts')->onDelete('cascade');
            $table->foreign('picture_id')->references('id')->on('pictures')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
