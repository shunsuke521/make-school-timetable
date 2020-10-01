<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['room_name', 'school_id'];

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
}
