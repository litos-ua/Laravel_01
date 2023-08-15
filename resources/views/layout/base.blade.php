<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.108.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @section('title') <title> Album example111 · Bootstrap v5.3 </title>@show
        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
        @section('css1') <link rel="stylesheet" href="{{ asset('/css/styles_home.css') }}?v=2"> @show
        {{---Подключение JS ниже мешало работе toggler (меню только сворачивалось, но не разворачивалось)-}}
        {{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
        <script src="{{ asset('js/app.js') }}"></script>
        {{--Подключаем параметры из config для файлов стиля и превращаем их в переменные--}}
        <style>
            :root {
                --background-image-home: url('{{ config('my_config.background_image_home') }}');
                --background-image: url('{{ config('my_config.background_image') }}');
                --logo-image: url('{{ config('my_config.logo_image') }}');
            }
        </style>

    </head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="{{ asset('js/local/flag.js') }}"></script>
{{--    <script>--}}
{{--     Остальное аналогично файлу flag.js                                                   --}}
{{--                var flagImageUrl = '{{ asset("/pictures/local/flags") }}/' + flagFilename;--}}
{{--     Остальное аналогично файлу flag.js                                                   --}}
{{--    </script>--}}

<body>
       @section('h1') @endsection
        @section('contentHeader1')
        <header>
            <div class="collapse bg-dark custom-collapse" id="navbarHeader">
                <div class="container  custom-container">

                    <div class="row custom-row">

                        <div class="col-sm-2 col-md-3 py-4">
                            {{--Loading different photos when expanding the header menu--}}
                            @if(Auth::check() and Auth::user()->status>0)
                            <a href="/"><img id = "logo" src = "{{ asset(config('my_config.logo_image_auth')) }}" alt="Альтернативний текст"/></a>
                            @else
                            <a href="/"><img id = "logo" src = "{{ asset(config('my_config.logo_image')) }}" alt="Альтернативний текст"/></a>
                            @endif
                        </div>

                        <div class="col-sm-6 col-md-3 py-3" id="about">
                            <h4 class="text-white">{{__('messages.about')}}</h4>
                            <p class="text-muted">{{__('messages.about_text')}}</p>
                        </div>

                        <div class="col-sm-2 offset-md-3 py-2" id="contact">
                            <h4 class="text-white">{{__('messages.contact')}}</h4>
                            <ul class="list-unstyled">
                                <li><a href="vacations/all" class="text-white" target="_blank">Follow on Twitter</a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=100014076607141" class="text-white">Like on Facebook</a></li>
                                <li><a href="#" class="text-white">Email me</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-2 offset-md-2 py-2" id="contact">
                            <h4 class="text-white">{{__('messages.input_del')}}</h4>
                            <ul class="list-unstyled">
                                <li><a href="/pictures/create" class="text-white" target="_blank">{{__('messages.pic_insert')}}</a></li>
                                <li><a href="/vacations/create" class="text-white" target="_blank">{{__('messages.vac_insert')}}</a></li>
                                <li><a href="/pictures/delete" class="text-white" target="_blank">{{__('messages.pic_delete')}}</a></li>
                                <li><a href="/vacations/delete" class="text-white" target="_blank">{{__('messages.vac_delete')}}</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm ">
                <div class="container" id="container2">
                    @yield('content1')
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" id = "head-form-search" action="{{ route('search') }}" method="POST">
                    @csrf
                        <div class="custom-input-group" id="search-group">
                            <input type="search"
                                   class="form-control form-control-dark text-bg-dark custom-search-input"
                                   name="simpleSearch"
                                   placeholder="{{__('messages.search_but')}}..."
                                   aria-label="{{__('messages.search_but')}}">
                            <button type="submit" class="btn btn-primary custom-search-button" id="search-button">{{__('messages.search_but')}}</button>
                        </div>
                    </form>
                    <div class="text-end">
                        @if (Auth::check())
                        <button type="button"
                                class="btn btn-outline-light me-2"
                                onclick="window.location.href= '/logout'">
                            {{__('messages.logout_but')}}
                        </button>
                        @else
                        <button type="button"
                                class="btn btn-outline-light me-2"
                                onclick="window.location.href= '/login'">
                            {{__('messages.login_but')}}
                        </button>
                        @endif
                        @if (!Auth::check())
                            <button type="button"
                                class="btn btn-warning"
                                onclick="window.location.href= '/register'">
                            {{__('messages.signup_but')}}
                        </button>
                        @endif
                            @if (Auth::check())
                                <button type="button"
                                        class="btn btn-outline-light me-2"
                                        @if(Auth::user()->status===3)
                                            onclick="window.location.href= '/admin/user'" {{--/pictures/create--}}
                                        @else
                                            onclick="window.location.href= '/user/edit'"
                                        @endif
                                        >
                                    {{__('messages.personal_account_but')}}
                                </button>
                            @endif

                    </div>
        @show
                    @section('languageSelector')
                    <!-- Language Selector Dropdown -->

                    @show
        @section('contentHeader2')
                    <button class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarHeader"
                            aria-controls="navbarHeader"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>
        @show

        @section('mainContent')
        <main>
            @if (isset(Auth::user()->status))
                <p>User Status:   {{Auth::user()->status}} &nbsp&nbsp&nbsp User Name:   {{Auth::user()->name}}
                    {{--Status type: {{ gettype(Auth::user()->status) }}--}}</p>
            @endif
            <section class="py-3 text-center container">
                <div>
                </div>
                <div class="row py-lg-1">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-normal">{!! __('messages.fio') !!}</h1>
                        <p class="lead font-weight-bold">{{ __('messages.album') }}</p>
                        </div>
                </div>
            </section>
                <div class="album py-5 bg-light">
                    <div class="container">

                    </div>
                </div>
        </main>
        @show

        @include('partials.footer')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
