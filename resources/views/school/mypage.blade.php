@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $school->name }} {{ $period["year"] }}年{{ $period["semester"] }}学期の時間割</div>

                <div class="card-body">

                <h3 class="timetable-grade">1年{{ $period["class"] }}組の時間割</h3>
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
                    @for($i = 0; $i < 8; $i++)
                        <tr class="mypage-timetable-lessons">
                            <td class="mypage-timetable-lesson_number">{{ $i+1 }}</td>
                            @foreach($newSchedules1[$i] as $newSchedule)
                                <td class="mypage-timetable-lesson">{{ $newSchedule }}</td>
                            @endforeach
                        </tr>
                    @endfor
                </table>
                <p class="more_timetable_link"><a href="#">>>1年生の時間割をもっと見る</a></p>
                <h3 class="timetable-grade">2年{{ $period["class"] }}組の時間割</h3>
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
                    @for($i = 0; $i < 8; $i++)
                        <tr class="mypage-timetable-lessons">
                            <td class="mypage-timetable-lesson_number">{{ $i+1 }}</td>
                            @foreach($newSchedules2[$i] as $newSchedule)
                                <td class="mypage-timetable-lesson">{{ $newSchedule }}</td>
                            @endforeach
                        </tr>
                    @endfor
                </table>
                <p class="more_timetable_link"><a href="#">>>2年生の時間割をもっと見る</a></p>
                <h3 class="timetable-grade">3年{{ $period["class"] }}組の時間割</h3>
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
                    @for($i = 0; $i < 8; $i++)
                        <tr class="mypage-timetable-lessons">
                            <td class="mypage-timetable-lesson_number">{{ $i+1 }}</td>
                            @foreach($newSchedules2[$i] as $newSchedule)
                                <td class="mypage-timetable-lesson">{{ $newSchedule }}</td>
                            @endforeach
                        </tr>
                    @endfor
                </table>
                <p class="more_timetable_link"><a href="#">>>3年生の時間割をもっと見る</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
