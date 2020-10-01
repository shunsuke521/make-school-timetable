<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getName()
    {
        return $this->name;
    }

    //hasOne結合を使う場合はメソッド名は単数形にすること
    public function schedule()
    {
        return $this->hasOne('App\Schedule');
    }

    //hasMany結合を使う場合はメソッド名は複数形にすること
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function lesson_name()
    {
        return $this->hasOne('App\LessonName');
    }

    public function lessons()
    {
        return $this->hasOne('App\Lesson');
    }
}
