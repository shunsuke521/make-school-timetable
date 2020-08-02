<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function mypage()
    {
        $school = Auth::user();
        \Log::info('$schoolの中身：'.$school);
        return view('school.mypage', ['school' => $school]);
    }
}
