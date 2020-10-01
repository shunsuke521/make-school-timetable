<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    // DBで間違っても変更させたくないカラム（ユーザーID、管理者権限など）にはロックをかけておく事ができる
    // ロックの掛け方にはfillableかguardedの２種類がある。
    // どちらかしか指定できない

    // モデルがその属性以外を持たなくなる（fillメソッドに対応しやすいが、カラムが増えるほど足していく必要あり）
    protected $fillable = ['day', 'school_id', 'year', 'grade', 'class', 'semester', 'lesson1', 'lesson2', 'lesson3', 'lesson4', 'lesson5', 'lesson6', 'lesson7', 'lesson8'];
    // モデルからその属性が取り除かれる（カラムが増えてもほとんど変更しなくて良い）
    // protected $guarded = ['id'];

    public function getData()
    {
        return $this->year;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson', 'lesson1');
    }
    public function lesson2()
    {
        return $this->belongsTo('App\Lesson', 'lesson2');
    }
}
