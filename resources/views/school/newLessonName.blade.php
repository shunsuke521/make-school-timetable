@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">科目登録</div>
                <div class="card-body">
                    <div class="my-5">
                        <form method="POST" action="{{ route('registerLessonName') }}">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <input autocomplete="off" id="name" type="text" placeholder="科目名" class="form-control @error('name') is-invalid @enderror" name="lesson_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <input autocomplete="off" id="name" type="text" placeholder="教員名" class="form-control @error('name') is-invalid @enderror" name="teacher" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        {{ Form::select('room_id', $classrooms, old('room_id'), ['required',  'placeholder' => '第一教室', 'class' => 'form-control']) }}

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        {{ Form::select('room_id2', $classrooms, old('room_id'), ['placeholder' => '第二教室', 'class' => 'form-control']) }}
                                        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-3 offset-md-7">
                                        <button type="submit" class="col-md-7 btn btn-secondary">
                                            登録
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="container">
                        <h2 class="col-md-5 my-3 registered-list-title">登録済みの科目一覧</h2>
                        <div class="row col-md-12 registered-list-body">
                            @foreach($newLessonName as $newLesson)
                            <div class="col-md-6 registered-classroom my-3">
                                <div class="box-left col-md-4">
                                    <h3 class="registered-lesson-name">{{ $newLesson[0] }}</h3>
                                    <span class="teacher-name">{{ $newLesson[1] }}先生</span>
                                </div>
                                <div class="box-right col-md-8">
                                    <table class="table table-sm table-borderless">
                                        <tr class="row line-height1"><th class="col-md-5">第一教室：</th><td class="col-md-7">{{ $newLesson[2] }}</td></tr>
                                        <tr class="row line-height1"><th class="col-md-5">第二教室：</th><td class="col-md-7">{{ $newLesson[3] }}</td></tr>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection