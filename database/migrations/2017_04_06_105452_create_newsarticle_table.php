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
            $table->increments('ID')->unique();
            $table->string('Title');
            $table->string('Image')->nullable();
            $table->string('Description');
            $table->string('Text');
            $table->date('Date');
            $table->tinyInteger('Visible');
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
        Schema::dropIfExists('newsarticles');
        //
    }
}
