<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('stuid');
            $table->timestamps();
            $table->string('full_name');
            $table->integer('gender');
            $table->dateTime('day_of_birth');
            $table->string('add_street');
            $table->string('add_ward');
            $table->string('add_district');
            $table->string('add_city');
            $table->string('sos_phone');
            $table->string('dad_full_name');
            $table->dateTime('dad_dob');
            $table->string('dad_phone');
            $table->string('mom_full_name');
            $table->dateTime('mom_dob');
            $table->string('mom_phone');
            $table->integer('group');
            $table->integer('pos');
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
