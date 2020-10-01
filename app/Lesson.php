<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['schoo_id', 'lesson_name_id', 'teacher_name'];

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function lesson_name()
    {
        return $this->belongsTo('App\LessonName',);
    }

    
}
