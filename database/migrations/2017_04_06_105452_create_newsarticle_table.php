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
        Schema::create('news_articles', function (Blueprint $table){
            $table->increments('ID')->unique();
            $table->string('Title');
            $table->string('Image')->nullable();
            $table->string('Description', 5000);
            $table->string('Text', 5000);
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
        Schema::dropIfExists('news_articles');
        //
    }
}
