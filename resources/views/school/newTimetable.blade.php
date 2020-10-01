@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">時間割登録</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('registerTimetable') }}">
                            @csrf

                            <div class="form-group row">
                                <div id="lesson_detail" class="col-md-12">
                                    <router-view
                                        :lesson_data="{{ (session('lesson_data')) }}"
                                        :lesson_names="{{ (session('lesson_names')) }}"></router-view>
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
