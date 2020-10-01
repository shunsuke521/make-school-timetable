<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', 'SchoolController@mypage')->name('mypage');
// Route::get('/createTimetable', 'SchoolController@createTimetable')->name('createTimetable');
Route::get('/new/classroom', 'SchoolController@newClassroom')->name('newClassroom');
Route::post('/register/classroom', 'SchoolController@registerClassroom')->name('registerClassroom');
Route::get('/new/lesson_name', 'SchoolController@newLessonName')->name('newLessonName');
Route::post('/register/lesson_name', 'SchoolController@registerLessonName')->name('registerLessonName');
Route::get('/new/lesson_detail', 'SchoolController@newLessonDetail')->where('any', '.*')->name('newLessonDetail');
Route::post('/new/lesson_detail', 'SchoolController@registerLessonDetail')->where('any', '.*')->name('registerLessonDetail');
Route::get('/new/timetable', 'SchoolController@newTimetable')->where('any', '.*')->name('newTimetable');
Route::post('/register/timetable', 'SchoolController@registerTimetable')->name('registerTimetable');
// Route::post('/{any}', function(){
//     return view('school.createTimetable');
// })->where('any', '.*')->name('registerLessonDetail');