<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLessonsTableToLessonNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // lessonsテーブルについていた外部キー制約を一度外して、lesson_nameテーブルに付け直す処理
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign('schedules_lesson1_foreign');
            $table->dropForeign('schedules_lesson2_foreign');
            $table->dropForeign('schedules_lesson3_foreign');
            $table->dropForeign('schedules_lesson4_foreign');
            $table->dropForeign('schedules_lesson5_foreign');
            $table->dropForeign('schedules_lesson6_foreign');
            $table->dropForeign('schedules_lesson7_foreign');
            $table->dropForeign('schedules_lesson8_foreign');

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
        Schema::table('lesson_name', function (Blueprint $table) {
            $table->dropForeign('schedules_lesson1_foreign');
            $table->dropForeign('schedules_lesson2_foreign');
            $table->dropForeign('schedules_lesson3_foreign');
            $table->dropForeign('schedules_lesson4_foreign');
            $table->dropForeign('schedules_lesson5_foreign');
            $table->dropForeign('schedules_lesson6_foreign');
            $table->dropForeign('schedules_lesson7_foreign');
            $table->dropForeign('schedules_lesson8_foreign');

            $table->foreign('lesson1')->references('id')->on('lessons');
            $table->foreign('lesson2')->references('id')->on('lessons');
            $table->foreign('lesson3')->references('id')->on('lessons');
            $table->foreign('lesson4')->references('id')->on('lessons');
            $table->foreign('lesson5')->references('id')->on('lessons');
            $table->foreign('lesson6')->references('id')->on('lessons');
            $table->foreign('lesson7')->references('id')->on('lessons');
            $table->foreign('lesson8')->references('id')->on('lessons');
        });
    }
}
