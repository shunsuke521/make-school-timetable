<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSchedulesColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //schedulesテーブルのschool_idカラムをuser_idカラムに変更
        Schema::table('schedules', function(Blueprint $table){
            $table->renameColumn('school_id', 'user_id');
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
            $table->renameColumn('user_id', 'school_id');
        });
    }
}
