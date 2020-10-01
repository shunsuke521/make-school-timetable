<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonName extends Model
{
    protected $table = 'lesson_name';
    protected $fillable = ['user_id', 'lesson_name', 'classroom1', 'classroom2', 'teacher'];

    public function getLessonName()
    {
        return $this->lesson_name;
    }

    public function getClassroom1()
    {
        return $this->classroom1;
    }
}
