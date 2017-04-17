<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creates the table for the techniques.
        Schema::create('techniques', function (BluePrint $table)
        {
            $table->increments('id')->unique();
            $table->string('name');
            $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drops the table for the techniques, if it exists.
        Schema::dropIfExists('techniques');
    }
}
