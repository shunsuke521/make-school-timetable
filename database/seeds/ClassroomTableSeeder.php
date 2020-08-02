<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->insert([
            'room_name' => '自教室',
            'school_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('classrooms')->insert([
            'room_name' => '理科室',
            'school_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('classrooms')->insert([
            'room_name' => '運動場',
            'school_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('classrooms')->insert([
            'room_name' => '体育館',
            'school_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('classrooms')->insert([
            'room_name' => '音楽室',
            'school_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('classrooms')->insert([
            'room_name' => '家庭科室',
            'school_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}
