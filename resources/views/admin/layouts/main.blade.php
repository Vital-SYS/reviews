<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Панель управления' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand mx-3" href="{{ route('admin.index') }}">Панель управления</a>
            <button class="navbar-toggler m-auto" type="button" data-toggle="collapse"
                    data-target="#navbar-example" aria-controls="navbar-example"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('review.index') }}">Главная</a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user.index') }}">Пользователи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Категории отзывов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.review.index') }}">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.article.index') }}">Статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.index') }}">Компании</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                            </li>
                        @endif
                    @else
                        <div>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-outline-primary" value="Выйти">
                            </form>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
            @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
</body>
</html>
