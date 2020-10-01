<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 1,
            'teacher_name' => '荒木',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 2,
            'teacher_name' => '井端',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 3,
            'teacher_name' => '福留',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 4,
            'teacher_name' => 'T・ウッズ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 5,
            'teacher_name' => 'アレックス',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 6,
            'teacher_name' => '森野',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 7,
            'teacher_name' => '井上',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 8,
            'teacher_name' => '谷繁',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('lessons')->insert([
            'school_id' => 3,
            'lesson_name_id' => 9,
            'teacher_name' => '川上',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
