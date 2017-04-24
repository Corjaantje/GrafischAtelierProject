<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table)
        {
            $table->increments('id')->unique();
            $table->string('name');
            $table->longtext('description');
            $table->string('coursegiver_name');
            $table->integer('max_signups')->nullable();
            $table->double('price');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('visible');
            $table->timestamps();
        });

        Schema::create('course_has_tables', function (Blueprint $table)
        {

            $table->integer('course_id')->references('id')->on('courses');
            $table->integer('table_id')->references('id')->on('tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_has_tables');
    }
}
