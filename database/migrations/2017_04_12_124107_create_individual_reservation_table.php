<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_reservations', function (Blueprint $table)
        {
            $table->increments('id')->unique();
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('table_id')->references('id')->on('tables');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('individual_reservations');
    }
}
