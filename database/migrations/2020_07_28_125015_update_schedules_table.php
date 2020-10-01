<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //schoolsテーブルのidに付いていた外部キー制約を一度外して、usersテーブルのidに付け直す処理
        Schema::table('schedules', function(Blueprint $table){
            $table->dropForeign('schedules_school_id_foreign');
            $table->foreign('school_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function(Blueprint $table){
            $table->dropForeign('schedules_school_id_foreign');
            $table->foreign('school_id')->references('id')->on('schools');
        });
    }
}
