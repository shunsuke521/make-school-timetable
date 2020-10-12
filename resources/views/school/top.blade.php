<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>時間割作成</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div id="app">
        <nav id="header" class="z-index3 navbar navbar-expand-md navbar-light bg-white shadow-sm top-header">
            <div class="container">
                <a class="navbar-brand site-title" href="{{ url('') }}">
                &nbsp;時間割作成&nbsp;
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main id="top-page">
            <img src="{{ asset('img/hero2.webp') }}" alt="">
            <div class="main-phrase">
                <h1>時間割の作成・管理に<br>&emsp;&emsp;&emsp;お困りではないですか？</h1>
                <!-- <p class="site-describe">小学校から高校まで幅広くご利用いただけます</p> -->
            </div>
            <div class="regi-or-login">
                <p><i class="fas fa-caret-down"></i>&emsp;今すぐ登録する</p>
                <a type="submit" class="col-md-10 btn btn-light">
                    新規登録
                </a>
                <p><i class="fas fa-caret-down"></i>&emsp;登録済みの方はこちら</p>
                <a type="submit" class="col-md-10 btn btn-secondary">
                    ログイン
                </a>
            </div>
            <div class="sample-video-zone">
                <h3 class="how-to-use"><i class="fas fa-caret-down"></i>&emsp;使い方はこちら</h3>
                <video src="{{ asset('img/sample3.mp4') }}" controls></video>
            </div>
        </main>
    </div>
</body>
</html>
