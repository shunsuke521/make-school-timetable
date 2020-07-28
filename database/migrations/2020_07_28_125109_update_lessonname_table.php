<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLessonnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lesson_name', function(Blueprint $table){
            $table->dropForeign('lesson_name_school_id_foreign');
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
        Schema::table('lesson_name', function(Blueprint $table){
            $table->dropForeign('lesson_name_school_id_foreign');
            $table->foreign('school_id')->references('id')->on('schools');
        });
    }
}
