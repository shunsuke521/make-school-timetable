@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">サンプル中学校 {{ $grade }}年生 {{ $year }}年{{ $semester }}学期の時間割</div>
                <div id="search-condition">
                    <form method="POST" action="{{ route('searchTimetables') }}">
                        @csrf
                        <div class="input-form">
                            <p class="input-form-condition">年度<input type="number" name="condition_year" min="1990" required></p>
                            <p class="input-form-condition">学年<input type="number" name="condition_grade" min="1" max="3" required></p>
                            <p class="input-form-condition">学期</label><input type="number" name="condition_semester" min="1" max="3" required></p>
                        </div>
                        <input type="submit" class="col-md-2 btn btn-secondary">
                    </form>
                </div>
                <div class="card-body">
                    @if(!empty($maxClass))
                        @for($i = 1; $i <= $maxClass; $i++)
                            <div class="more-schedule">
                                <h3 class="timetable-grade">{{ $i }}組の時間割</h3>
                                <table class="mypage-timetable">
                                    <tr class="mypage-timetable-days">
                                        <th class="mypage-timetable-day">&nbsp;</th>
                                        <th class="mypage-timetable-day">月</th>
                                        <th class="mypage-timetable-day">火</th>
                                        <th class="mypage-timetable-day">水</th>
                                        <th class="mypage-timetable-day">木</th>
                                        <th class="mypage-timetable-day">金</th>
                                        <th class="mypage-timetable-day">土</th>
                                    </tr>
                                    @for($j = 1; $j <= 8; $j++)
                                        <tr class="mypage-timetable-lessons">
                                            <td class="mypage-timetable-lesson_number">{{ $j }}</td>
                                            @for($k = 1; $k <= 6; $k++)
                                                <td class="mypage-timetable-lesson">{{ $schedules["class".$i]["day".$k]["lesson".$j]["lesson_name"] }}</td>
                                            @endfor
                                        </tr>
                                    @endfor
                                </table>
                            </div>
                        @endfor
                    @else
                        <h2>{{ $emptyBox }}</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection