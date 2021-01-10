@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body login-success">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="login-success-sentence">{{ __('You are logged in!') }}</p>
                </div>
                <p class="link-to-mypage"><a href="{{ route('mypage') }}">>>マイページへ</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
