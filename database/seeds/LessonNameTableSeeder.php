<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '国語',
            'classroom1' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '数学',
            'classroom1' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '英語',
            'classroom1' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '理科',
            'classroom1' => 13,
            'classroom2' => 14,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '社会',
            'classroom1' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '体育',
            'classroom1' => 15,
            'classroom2' => 16,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '音楽',
            'classroom1' => 17,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '家庭科',
            'classroom1' => 18,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lesson_name')->insert([
            'school_id' => 3,
            'lesson_name' => '総合',
            'classroom1' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
