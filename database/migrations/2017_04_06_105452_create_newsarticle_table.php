<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsarticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('newsarticles', function (Blueprint $table){
            $table->increments('id')->unique();
            $table->string('title');
            $table->string('image');
            $table->string('description');
            $table->string('text');
            $table->date('date');
            $table->tinyInteger('visible');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsarticles');
        //
    }
}
