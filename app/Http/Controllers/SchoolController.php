<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Schedule;
use App\Lesson;
use App\Classroom;
use App\LessonName;

class SchoolController extends Controller
{
    public function mypage()
    {
        $school = Auth::user();
        //時間割の科目に関してはEloquentでやる方法がよくわからなかったので結局クエリビルダでやる
        // $schedule1 = DB::table('schedules')->join('lessons', 'schedules.lesson1', '=', 'lessons.id')
        //                                    ->join('lesson_name', 'lessons.lesson_name_id', '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        // $schedule2 = DB::table('schedules')->join('lessons', 'schedules.lesson2', '=', 'lessons.id')
        //                                    ->join('lesson_name', 'lessons.lesson_name_id', '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        // $schedule3 = DB::table('schedules')->join('lessons', 'schedules.lesson3', '=', 'lessons.id')
        //                                    ->join('lesson_name', 'lessons.lesson_name_id', '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        // $schedule4 = DB::table('schedules')->join('lessons', 'schedules.lesson4', '=', 'lessons.id')
        //                                    ->join('lesson_name', 'lessons.lesson_name_id', '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        // $schedule5 = DB::table('schedules')->join('lessons', 'schedules.lesson5', '=', 'lessons.id')
        //                                    ->join('lesson_name', 'lessons.lesson_name_id', '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        // $schedule6 = DB::table('schedules')->join('lessons', 'schedules.lesson6', '=', 'lessons.id')
        //                                    ->join('lesson_name', 'lessons.lesson_name_id', '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        // $schedule7 = DB::table('schedules')->join('lessons', 'schedules.lesson7', '=', 'lessons.id')
        //                                    ->join('lesson_name', 'lessons.lesson_name_id', '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        // $schedule8 = DB::table('schedules')->join('lessons', 'schedules.lesson8', '=', 'lessons.id')
        //                                    ->join('lesson_name', "lessons.lesson_name_id", '=', 'lesson_name.id')
        //                                    ->where('grade', 1)
        //                                    ->pluck('lesson_name', 'day');
        
        // $schedules = [$schedule1, $schedule2, $schedule3, $schedule4, $schedule5, $schedule6, $schedule7, $schedule8];


        $period = ["year" => 2020, "semester" => 1, "class" => "A"];
        // リファクタ
        // 一年生の時間割
        for ($i=1; $i <= 8; $i++) { 
            $schedules1[] = DB::table('schedules')->join('lesson_name', "schedules.lesson{$i}", '=', 'lesson_name.id')
                                     ->where('grade', 1)
                                     ->where('year', $period["year"])
                                     ->where('semester', $period["semester"])
                                     ->where('class', $period["class"])
                                     ->where('schedules.user_id', $school->id)
                                     ->pluck('lesson_name', 'day');
                                    //  pluckは取り出したいカラムを第一引数、キーにしたいカラムを第二引数に指定する
                                    // この例だと、曜日の数字をキーにしてその曜日にどの教科が入っているか、というような形になっている
        }

        foreach ($schedules1 as $schedule) {
            $day = [];
            foreach ($schedule as $key => $value) {
                array_push($day, $key);
            }
            // \Log::info('$dayの中身'.print_r($day,true));
            // $dayには科目が登録されている曜日の数字が入る
            // 例えば1時間目は月曜から金曜まで入っていて、土曜日は入っていないから1~5が配列に入る
            // 6時間目だと月、水、金しか登録されていないので、配列には1、3、5が入る

            $newSchedule1 = array();
            for ($i=1; $i <= 6 ; $i++) { 
                if (in_array($i, $day)) {
                    // in_arrayは第二引数の配列に第一引数の値が入っているか判定して、入っていればtrueを返
                    // array_searchだと値があった場合にその値のインデックスキーが返される
                    $newSchedule1[$i] = $schedule[$i];
                }else {
                    $newSchedule1[$i] = '-';
                }
            }
            ksort($newSchedule1);
            $newSchedules1[] = $newSchedule1;
        }

        // \Log::info($newSchedules1);

        // 二年生の時間割
        for ($i=1; $i <= 8; $i++) { 
            $schedules2[] = DB::table('schedules')->join('lesson_name', "schedules.lesson{$i}", '=', 'lesson_name.id')
                                     ->where('grade', 2)
                                     ->where('schedules.user_id', $school->id)
                                     ->pluck('lesson_name', 'day');
        }

        foreach ($schedules2 as $schedule) {
            $day = [];
            foreach ($schedule as $key => $value) {
                array_push($day, $key);
            }
            $newSchedule2 = array();
            for ($i=1; $i <= 6 ; $i++) { 
                if (in_array($i, $day)) {
                    $newSchedule2[$i] = $schedule[$i];
                }else {
                    $newSchedule2[$i] = '-';
                }
            }
            ksort($newSchedule2);
            $newSchedules2[] = $newSchedule2;
            // \Log::info($newSchedule2);
        }
        
        // 三年生の時間割
        for ($i=1; $i <= 8; $i++) { 
            $schedules3[] = DB::table('schedules')->join('lesson_name', "schedules.lesson{$i}", '=', 'lesson_name.id')
                                     ->where('grade', 3)
                                     ->where('schedules.user_id', $school->id)
                                     ->pluck('lesson_name', 'day');
        }

        foreach ($schedules3 as $schedule) {
            $day = [];
            foreach ($schedule as $key => $value) {
                array_push($day, $key);
            }
            $newSchedule3 = array();
            for ($i=1; $i <= 6 ; $i++) { 
                if (in_array($i, $day)) {
                    $newSchedule3[$i] = $schedule[$i];
                }else {
                    $newSchedule3[$i] = '-';
                }
            }
            ksort($newSchedule3);
            $newSchedules3[] = $newSchedule3;
            // \Log::info($newSchedule3);
        }
                
        return view('school.mypage', ['period' => $period, 'school' => $school, 'newSchedules1' => $newSchedules1, 'newSchedules2' => $newSchedules2, 'newSchedules3' => $newSchedules3]);
    }

    public function newClassroom()
    {
        $school = Auth::user();
        $classrooms = DB::table('classrooms')->join('users', 'classrooms.user_id', '=', 'users.id')
                                             ->where('classrooms.user_id', $school->id)
                                             ->pluck('classrooms.room_name');

        return view('school.newClassroom', ['classrooms' => $classrooms]);
    }

    public function registerClassroom(Request $request)
    {
        $school = Auth::user();
        $classroom = new Classroom;

        $request->validate([
            'room_name' => 'required|string|max:255'
        ]);

        $classroom->room_name = $request->room_name;
        $classroom->user_id = $school->id;
        $classroom->save();

        return redirect('/new/classroom');
    }

    public function newLessonName()
    {
        $school = Auth::user();

        // 登録済みの教室名の取得
        $classrooms = DB::table('classrooms')->join('users', 'classrooms.user_id', '=', 'users.id')
                                             ->where('classrooms.user_id', $school->id)
                                             ->pluck('classrooms.room_name', 'classrooms.id');

        // 以下、登録済みの科目の取得
        // 第二教室はブランク可のカラムなので、取り出し方が難しく、複雑になってしまう。もっといい方法ありそう
        $lesson_names = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                                ->where('users.id', $school->id)
                                                ->pluck('lesson_name', 'lesson_name.id');

        $teachers = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                            ->where('users.id', $school->id)
                                            ->pluck('teacher', 'lesson_name.id');

        $classroom1 = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                             ->join('classrooms', 'lesson_name.classroom1', '=', 'classrooms.id')
                                             ->where('users.id', $school->id)
                                             ->pluck('room_name', 'lesson_name.id');

        $classroom2 = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                             ->join('classrooms', 'lesson_name.classroom2', '=', 'classrooms.id')
                                             ->where('users.id', $school->id)
                                             ->pluck('room_name', 'lesson_name.id');

        // $classroom2のままだとオブジェクト型でin_arrayが使えないので、科目idだけの配列と科目idと教室名の新しい連想配列を作る
        $id = array();
        foreach ($classroom2 as $key => $value) {
            $id[] = $key;
        }

        $idAndClassroomName = array();
        foreach ($classroom2 as $key => $value) {
            $idAndClassroomName[$key] = $value;
        }

        // オブジェクト型を連想配列に一行でキャストする方法があるっぽいけど、よくわからなかった
        $newClassroom1 = array();
        foreach ($classroom1 as $key => $value) {
            $newClassroom1[$key] = $value;
        }

        $newTeachers = array();
        foreach ($teachers as $key => $value) {
            $newTeachers[$key] = $value;
        }
        

        $newClassroom2 = array();
        // 次に$lesson_namesに入っているidと一つずつ比較していって、入っていれば新しい配列に入れる　入っていなければ「-」を入れる
        foreach ($lesson_names as $key => $value) {
            if (in_array($key, $id)) {
                $newClassroom2[$key] = $idAndClassroomName[$key];
            }else {
                $newClassroom2[$key] = '-';
            }
        }
        
        $newLessonName = array();
        if (!empty($newClassroom1)) {
            // 連想配列の値に[科目名、第一教室、第二教室]となる配列を順番に入れる
            foreach ($lesson_names as $key => $value) {
                array_push($newLessonName, [$value,$newTeachers[$key] , $classroom1[$key], $newClassroom2[$key]]);
            }
        }

        // \Log::info('$classroomsの中身：'.print_r($classrooms, true));
        // \Log::info('$newLessonNameの中身：'.print_r($newLessonName, true));

        return view('school.newLessonName', ['newLessonName' => $newLessonName, 'classrooms' => $classrooms]);
    }

    public function registerLessonName(Request $request)
    {
        $user = Auth::user();
        $lessonName = new LessonName;
        // \Log::info(print_r($_POST, true));
        // \Log::info('$requestの中身：');
        // \Log::info($request->lesson_name);
        // \Log::info($request->teacher);
        // \Log::info($request->room_id);

        $request->validate([
            'lesson_name' => 'required|string|max:255',
            'teacher' => 'required|string|max:255'
        ]);
        \Log::info('ここまでは処理されたよ');

        $lessonName->lesson_name = $request->lesson_name;
        $lessonName->teacher = $request->teacher;
        $lessonName->user_id = $user->id;
        $lessonName->classroom1 = $request->room_id;
        if (!empty($request->room_id2)) {
            \Log::info('classroom2も登録するよ 中身：'.$request->room_id2);
            $lessonName->classroom2 = $request->room_id2;
        }
        \Log::info('$lessonNameの中身：'.$lessonName);
        $lessonName->save();

        return redirect('/new/lesson_name');
    }

    public function newLessonDetail(Request $request)
    {
        $school = Auth::user();
        
        // 以下、登録済みの科目の取得
        // 第二教室はブランク可のカラムなので、取り出し方が難しく、複雑になってしまう。もっといい方法ありそう
        $lesson_names = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                                ->where('users.id', $school->id)
                                                ->pluck('lesson_name', 'lesson_name.id');

        $teachers = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                            ->where('users.id', $school->id)
                                            ->pluck('teacher', 'lesson_name.id');

        $classroom1 = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                             ->join('classrooms', 'lesson_name.classroom1', '=', 'classrooms.id')
                                             ->where('users.id', $school->id)
                                             ->pluck('room_name', 'lesson_name.id');

        $classroom2 = DB::table('lesson_name')->join('users', 'lesson_name.user_id', '=', 'users.id')
                                             ->join('classrooms', 'lesson_name.classroom2', '=', 'classrooms.id')
                                             ->where('users.id', $school->id)
                                             ->pluck('room_name', 'lesson_name.id');

        // $classroom2のままだとオブジェクト型でin_arrayが使えないので、科目idだけの配列と科目idと教室名の新しい連想配列を作る
        $id = array();
        foreach ($classroom2 as $key => $value) {
            $id[] = $key;
        }

        $idAndClassroomName = array();
        foreach ($classroom2 as $key => $value) {
            $idAndClassroomName[$key] = $value;
        }

        // オブジェクト型を連想配列に一行でキャストする方法があるっぽいけど、よくわからなかった
        $newClassroom1 = array();
        foreach ($classroom1 as $key => $value) {
            $newClassroom1[$key] = $value;
        }

        $newTeachers = array();
        foreach ($teachers as $key => $value) {
            $newTeachers[$key] = $value;
        }
        

        $newClassroom2 = array();
        // 次に$lesson_namesに入っているidと一つずつ比較していって、入っていれば新しい配列に入れる　入っていなければ「-」を入れる
        foreach ($lesson_names as $key => $value) {
            if (in_array($key, $id)) {
                $newClassroom2[$key] = $idAndClassroomName[$key];
            }else {
                $newClassroom2[$key] = '-';
            }
        }
        
        $lessons = array();
        if (!empty($newClassroom1)) {
            // 連想配列の値に[科目名、第一教室、第二教室]となる配列を順番に入れる
            foreach ($lesson_names as $key => $value) {
                array_push($lessons, [$key, $value, $newTeachers[$key] , $classroom1[$key], $newClassroom2[$key]]);
            }
        }
        \Log::info($lessons);

        return view('school.newLessonDetail', ['lessons' => $lessons]);
    }

    public function registerLessonDetail(Request $request)
    {
        \Log::info($request);
        $lesson_number = count($request->lesson_id);

        $tmp_lessons = [];
        for ($i=0; $i < $lesson_number; $i++) { 
            $tmp_lessons[] = DB::table('lesson_name')->where('id', $request->lesson_id[$i])->get();
        }

        $lesson_data = [];
        for ($i=0; $i < $lesson_number; $i++) { 
            $lesson_data[$tmp_lessons[$i][0]->id] = [$tmp_lessons[$i][0]->lesson_name, $tmp_lessons[$i][0]->teacher, $request->per_week[$i], $request->continuity[$i], $request->max_per_day[$i]];
        }

        \Log::info('$lesson_dataの中身：'.print_r($lesson_data, true));

        $lesson_names = [];
        for ($i=0; $i < $lesson_number; $i++) { 
            $lesson_names[$tmp_lessons[$i][0]->id] = $tmp_lessons[$i][0]->lesson_name;
        }

        \Log::info('$lesson_namesの中身：'.print_r($lesson_names, true));

        // json_encode()によって配列をオブジェクト化する　そうしないとlaravelのviewからvueのコンポーネントにデータを渡すことができない
        $lesson_names = json_encode($lesson_names);
        $lesson_data = json_encode($lesson_data);

        \Log::info('$lesson_dataの中身：'.print_r($lesson_data, true));
        \Log::info('$lesson_namesの中身：'.print_r($lesson_names, true));
        
        return redirect('/new/timetable')->with([
            'lesson_data' => $lesson_data,
            'lesson_names' => $lesson_names
            ]);
    }

    public function newTimetable()
    {
        return view('school.newTimetable');
    }

    public function registerTimetable(Request $request )
    {
        \Log::info($request);


        $school = Auth::user();
        $schedule = new Schedule;

        $days = array("mon" => 1, "tue" => 2, "wed" => 3, "thu" => 4, "fri" => 5, "sat" => 6);
        foreach ($days as $key => $value) {
                $schedule = new Schedule;
    
                $schedule->day = $value;
                $schedule->user_id = $school->id;
                $schedule->year = $request->year;
                $schedule->grade = $request->grade;
                $schedule->class = $request->class;
                $schedule->semester = $request->semester;
                \Log::info('ここまでは処理されたよ');
                
                $schedule->lesson1 = $request->$key[0];
                $schedule->lesson2 = $request->$key[1];
                $schedule->lesson3 = $request->$key[2];
                $schedule->lesson4 = $request->$key[3];
                $schedule->lesson5 = $request->$key[4];
                $schedule->lesson6 = $request->$key[5];
                $schedule->lesson7 = $request->$key[6];
                $schedule->lesson8 = $request->$key[7];
                \Log::info('スケジュール登録するぞ');
                $schedule->save();
        }

        // redirectにするとweb.phpに記載されているルーティングが実行されるらしい（Route::get）
        return redirect('/mypage');
    }
}
