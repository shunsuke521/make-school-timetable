<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('day');
            $table->unsignedBigInteger('user_id');
            $table->integer('year');
            $table->integer('grade');
            $table->string('class');
            $table->integer('semester');
            $table->unsignedBigInteger('lesson1')->nullable();
            $table->unsignedBigInteger('lesson2')->nullable();
            $table->unsignedBigInteger('lesson3')->nullable();
            $table->unsignedBigInteger('lesson4')->nullable();
            $table->unsignedBigInteger('lesson5')->nullable();
            $table->unsignedBigInteger('lesson6')->nullable();
            $table->unsignedBigInteger('lesson7')->nullable();
            $table->unsignedBigInteger('lesson8')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lesson1')->references('id')->on('lesson_name');
            $table->foreign('lesson2')->references('id')->on('lesson_name');
            $table->foreign('lesson3')->references('id')->on('lesson_name');
            $table->foreign('lesson4')->references('id')->on('lesson_name');
            $table->foreign('lesson5')->references('id')->on('lesson_name');
            $table->foreign('lesson6')->references('id')->on('lesson_name');
            $table->foreign('lesson7')->references('id')->on('lesson_name');
            $table->foreign('lesson8')->references('id')->on('lesson_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
