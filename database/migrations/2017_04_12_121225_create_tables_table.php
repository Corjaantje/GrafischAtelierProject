<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creates the database table to manage the tables, which consist of a technique and a number. An example is "Zeefdruk - 1".
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('technique');
            $table->integer('table_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drops the database table associated with the table management.
        Schema::dropIfExists('tables');
    }
}
