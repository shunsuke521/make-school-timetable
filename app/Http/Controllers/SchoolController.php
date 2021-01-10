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
    public $period = ["year" => 2020, "semester" => 1, "class" => 1];

    public function mypage()
    {
        $school = Auth::user();

        // 一年生の時間割
        for ($i=1; $i <= 8; $i++) { 
            $schedules1[] = DB::table('schedules')->join('lesson_name', "schedules.lesson{$i}", '=', 'lesson_name.id')
                                     ->where('grade', 1)
                                     ->where('year', $this->period["year"])
                                     ->where('semester', $this->period["semester"])
                                     ->where('schedules.user_id', $school->id)
                                     ->where('class', $this->period["class"])
                                     ->pluck('lesson_name', 'day');
                                    //  pluckは取り出したいカラムを第一引数、キーにしたいカラムを第二引数に指定する
                                    // この例だと、曜日の数字をキーにしてその曜日にどの教科が入っているか、というような形になっている
        }
        \Log::info(print_r($schedules1,true));

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
                    // in_arrayは第二引数の配列に第一引数の値が入っているか判定して、入っていればtrueを返す
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
                                     ->where('year', $this->period["year"])
                                     ->where('semester', $this->period["semester"])
                                     ->where('schedules.user_id', $school->id)
                                     ->where('class', $this->period["class"])
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
                                     ->where('year', $this->period["year"])
                                     ->where('semester', $this->period["semester"])
                                     ->where('schedules.user_id', $school->id)
                                     ->where('class', $this->period["class"])
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
                
        return view('school.mypage', ['period' => $this->period, 'school' => $school, 'newSchedules1' => $newSchedules1, 'newSchedules2' => $newSchedules2, 'newSchedules3' => $newSchedules3]);
    }

    public function moreTimetable(Request $request, $grade)
    {
        \Log::info('moreTimetableの処理に入ったよ');
        // まず対象の学年の対象の学期の時間割を全て抜いてくる
        // 1組の時間割からn組の時間割まで昇順に並べる
        // 登録のない組の時間割は「-」で表示する
        // 登録のある最大組より先のクラスの時間割は表示しない（3組までしか時間割の登録がなければ4組以降は非表示となるように）
        // 同じ条件(年度、学年、学期、クラス)の時間割は2つ以上登録がないことを前提として進める
        
        if (!empty($request->old())) {
            \Log::info('検索対象あり');
            $targetYear = $request->old()['year'];
            $targetSemester = $request->old()['semester'];
            \Log::info('検索対象年：'.$targetYear);
            \Log::info('検索対象学期：'.$targetSemester);
        }else{
            \Log::info('検索対象なし');
            $targetYear = 2020;
            $targetSemester = 1;
        }

        $school = Auth::user();

        // 登録のあるクラスを降順で取得して上から一つだけを取得　->　最大値を取得
        $class = DB::table('schedules')->where('grade', $grade)
                                        ->where('year', $targetYear)
                                        ->where('semester', $targetSemester)
                                        ->where('schedules.user_id', $school->id)
                                        ->orderBy('class', 'DESC')
                                        ->limit(1)
                                        ->get('class');
                                        \Log::info(print_r($class, true));
        
        if (empty($class[0])) {
            \Log::info('スケジュールの登録がありません。');
            return view('school.moreTimetable', ['emptyBox' => '時間割の登録がありません', 'maxClass' => '', 'year' => $targetYear, 'grade' => $grade, 'semester' => $targetSemester]);
        }else {
            \Log::info('スケジュールの登録があるよ');
            \Log::info(print_r($class[0], true));
        }

        $maxClass = $class[0]->class;

        // 1クラスずつ時間割の登録があるか確認する
        for ($i=1; $i <= $maxClass; $i++) { 
            $targetClass = DB::table('schedules')->where('grade', $grade)
                                                ->where('year', $targetYear)
                                                ->where('semester', $targetSemester)
                                                ->where('user_id', $school->id)
                                                ->where('class', $i)
                                                ->get();
            
            // 対象のクラスの時間割登録があるかどうか(DBから取得できているかどうか)
            if (!empty($targetClass[0])) {
                // 登録があればそのクラスの時間割を取得
                for ($j=1; $j <= 8; $j++) { 
                    // 時限単位で取得している
                    // そのため、8回繰り返してようやく全クラスの1〜8時限の科目を取得できる(nullは取得してこない)
                    $schedules = DB::table('schedules')->join('lesson_name', "schedules.lesson{$j}", '=', 'lesson_name.id')
                                            ->where('grade', $grade)
                                            ->where('class', $i)
                                            ->where('year', $targetYear)
                                            ->where('semester', $targetSemester)
                                            ->where('schedules.user_id', $school->id)
                                            ->get(['class', 'day', 'lesson_name', "lesson{$j}"]);
                
                    // 取得したデータを配列にキャストする
                    // まず、取得してきた対象時限目が空でないか判定
                    $key = 0; //取得したスケジュールのデータのキーと比較するための変数　合っていなかったら同じ配列と比較する必要があるため増えないこともある
                    $getDay = 1; //何曜日の処理をしているかを示す数字　1〜6(月〜土)
                    while ($getDay <= 6) {
                        if (!empty($schedules[0])) {
                            // 科目が入っていた場合、0番目に月曜日のものが入っているとは限らないので
                            // 0＝月、1＝火というように合わせていく
                            // 配列が続いているかどうかの判定
                                if (!empty($schedules[$key])) {
                                    if ($schedules[$key]->day === $getDay) {
                                        // 配列が続いていて、比較用の曜日数($getDay)と格納されている曜日(->day)が一致している場合
                                        $newSchedules["class".$i]["day".$getDay]["lesson".$j] = (array)$schedules[$key];
                                    }else {
                                        // 配列が続いているが、登録されている曜日が処理されている曜日と合っていない場合
                                        \Log::info("ここだよー");
                                        $newSchedules["class".$i]["day".$getDay]["lesson".$j] = array("class" => "いつもここから", "day" => $getDay, "lesson_name" => "-", "lesson{$j}" => "-");
                                        $getDay++;
                                        // 同じ配列の要素を対象とするためにここでは$keyの値を増やさない
                                        continue;
                                    }
                                }else {
                                    $newSchedules["class".$i]["day".$getDay]["lesson".$j] = array("class" => $i, "day" => $getDay, "lesson_name" => "-", "lesson{$j}" => "-");
                                }
                                $getDay++;
                                $key++;
                        }else {
                            // (8時限目とかの)時間割の登録がない場合は、ここで6回分空が入り、whileループも終わるようになっている
                            for ($k=1; $k <= 6; $k++) { 
                                $newSchedules["class".$i]["day".$getDay]["lesson".$j] = array("class" => $i, "day" => $getDay, "lesson_name" => "-", "lesson{$j}" => "-");
                                $getDay++;
                                $key++;
                            }
                        }
                    }
                }
            }else {
                \Log::info("こっち通ってるよ");
                for ($k=1; $k <= 6; $k++) { 
                    for ($l=1; $l <= 8; $l++) { 
                        $newSchedules["class".$i]["day".$k]["lesson".$l] = array("class" => $i, "day" => $k, "lesson_name" => "-", "lesson{$l}" => "-");
                    }
                }
            }
        }

        // \Log::info(print_r($newSchedules["class5"], true));
        // \Log::info($schedules[0][0]->lesson_name); 　＝＞　国語
        // $test = (array)$schedules[0][0];
        // \Log::info(print_r($test, true));
        
        return view('school.moreTimetable', ['schedules' => $newSchedules, 'maxClass' => $maxClass, 'year' => $targetYear, 'grade' => $grade, 'semester' => $targetSemester]);
    }

    public function searchTimetables(Request $request)
    {
        $year = $request->condition_year;
        $grade = $request->condition_grade;
        $semester = $request->condition_semester;

        return redirect("/more_timetable/{$grade}")->withInput([
            'year' => $year,
            'semester' => $semester
            ]);
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

    public function editClassroom()
    {
        \Log::info('editClassroom');

        return redirect('/new/classroom');
    }

    public function deleteClassroom()
    {
        \Log::info('deleteClassroom');

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
