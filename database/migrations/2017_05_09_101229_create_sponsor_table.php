<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the database associated with the sponsors
        Schema::create('sponsors', function (Blueprint $table)
        {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('image');
            $table->string('sponsor_url');
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
        // Drops the table associated with the sponsors
        Schema::dropIfExists('sponsors');
    }
}
