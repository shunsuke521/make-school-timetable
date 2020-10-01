<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'day' => 1,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 3,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 2,
            'lesson2' => 1,
            'lesson3' => 6,
            'lesson4' => 4,
            'lesson5' => 5,
            'lesson6' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 2,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 3,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 3,
            'lesson2' => 1,
            'lesson3' => 5,
            'lesson4' => 2,
            'lesson5' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 3,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 3,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 3,
            'lesson2' => 2,
            'lesson3' => 4,
            'lesson4' => 5,
            'lesson5' => 7,
            'lesson6' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 4,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 3,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 5,
            'lesson2' => 3,
            'lesson3' => 2,
            'lesson4' => 8,
            'lesson5' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 5,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 3,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 4,
            'lesson2' => 5,
            'lesson3' => 7,
            'lesson4' => 3,
            'lesson5' => 9,
            'lesson6' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 1,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 2,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 1,
            'lesson2' => 9,
            'lesson3' => 3,
            'lesson4' => 2,
            'lesson5' => 6,
            'lesson6' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 2,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 2,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 3,
            'lesson2' => 5,
            'lesson3' => 2,
            'lesson4' => 6,
            'lesson5' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 3,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 2,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 3,
            'lesson2' => 8,
            'lesson3' => 4,
            'lesson4' => 1,
            'lesson5' => 3,
            'lesson6' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 4,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 2,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 9,
            'lesson2' => 5,
            'lesson3' => 3,
            'lesson4' => 4,
            'lesson5' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 5,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 2,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 4,
            'lesson2' => 3,
            'lesson3' => 7,
            'lesson4' => 4,
            'lesson5' => 3,
            'lesson6' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 1,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 1,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 1,
            'lesson2' => 3,
            'lesson3' => 4,
            'lesson4' => 7,
            'lesson5' => 5,
            'lesson6' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 2,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 1,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 4,
            'lesson2' => 3,
            'lesson3' => 2,
            'lesson4' => 7,
            'lesson5' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 3,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 1,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 1,
            'lesson2' => 4,
            'lesson3' => 6,
            'lesson4' => 3,
            'lesson5' => 4,
            'lesson6' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 4,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 1,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 2,
            'lesson2' => 4,
            'lesson3' => 6,
            'lesson4' => 2,
            'lesson5' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('schedules')->insert([
            'day' => 5,
            'school_id' => 3,
            'year' => 2020,
            'grade' => 1,
            'class' => 1,
            'semester' => 2,
            'lesson1' => 1,
            'lesson2' => 2,
            'lesson3' => 6,
            'lesson4' => 4,
            'lesson5' => 2,
            'lesson6' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
