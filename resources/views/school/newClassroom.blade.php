@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">教室登録</div>
                <div class="card-body">
                    <div class="my-5">
                        <form method="POST" action="{{ route('registerClassroom') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input autocomplete="off" id="name" placeholder="教室名" type="text" class="form-control @error('name') is-invalid @enderror" name="room_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                        <h2 class="col-md-5 offset-md-1 my-3 registered-list-title">登録済みの教室一覧</h2>
                        <div class="row col-md-10 offset-md-1 my-3">
                            @foreach($classrooms as $classroom)
                            <div class="col-md-3 registered-classroom-elm">{{ $classroom }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection