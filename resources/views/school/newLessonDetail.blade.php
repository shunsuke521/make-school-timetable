@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">科目詳細登録</div>

                <div class="card-body lesson-detail-body">
                    <form method="POST" name="test" action="{{ route('registerLessonDetail') }}">
                            @csrf

                            <div class="form-group row">
                                <div id="lesson_detail" class="col-md-10 offset-md-1">
                                @foreach($lessons as $key => $lesson)
                                    <router-view 
                                        lesson_id="{{ $lesson[0] }}"
                                        lesson_name="{{ $lesson[1] }}"
                                        teacher="{{ $lesson[2] }}"
                                        classroom1="{{ $lesson[3] }}"
                                        classroom2="{{ $lesson[4] }}"
                                        input_number="{{ $key }}"></router-view>
                                @endforeach
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-3 offset-md-8">
                                    <button type="submit" class="col-md-7 btn btn-secondary">
                                        登録
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
