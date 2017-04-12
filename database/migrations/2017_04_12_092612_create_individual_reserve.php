<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualReserve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_reserve', function (Blueprint $table){
            $table->increments('id')->unique();
            $table->integer('user_id');
            $table->integer('table_id');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual_reserve');
    }
}
