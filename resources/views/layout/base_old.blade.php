<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> @section('title') Welcome!@endsection </title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    @section('css_old')
        <link rel="stylesheet" href="{{ asset('/css/styles_auth.css') }}">
    @show
    @stack('additional_styles')
{{--    @if(Auth::check())--}}
{{--        <script src="{{ asset('js/local/flag.js') }}"></script>--}}
{{--    @else--}}
{{--        <script src="{{ asset('js/local/flag_ses.js') }}"></script>--}}
{{--    @endif--}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   </head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <script src="{{ asset('js/local/flag.js') }}"></script>
   <body>
   {{-- @section('body') --}}
  <header>
        <div class="container">
            <div class="row ">
                <div class="col-md-2">
                    <a href="/"><img id = "logo" src = "{{ asset(config('my_config.logo_image')) }}" alt="Альтернативний текст"/></a>
                </div>
                <div class="col-md-10 right">
                    @section('header')

                        <div class="text-end">
                        @if (Auth::check())
                            <button type="button"
                                    class="btn btn-outline-light me-2"
                                    onclick="window.location.href= '/logout'">
                                {{__('auth.logout')}}
                            </button>
                        @else
                            <button type="button"
                                    class="btn btn-outline-light me-2"
                                    onclick="window.location.href= '/login'">
                                {{__('auth.login')}}
                            </button>
                                @endif

                            <button type="button"
                                    class="btn btn-warning"
                                    onclick="window.location.href= '/register'">
                                {{__('auth.sign-up')}}
                            </button>

                            <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{__('messages.lang_but')}}
                            </button>
                            <img class="flag-icon" src="{{ asset(config('my_config.path_en_flags')) }}" alt="Flag" data-language="en">
                            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                <li><a class="dropdown-item" href="{{ route(Route::currentRouteName())}}" data-language="en">English</a></li>
                                <li><a class="dropdown-item" href="{{ route(Route::currentRouteName())}}" data-language="pl">Polish</a></li>
                                <li><a class="dropdown-item" href="{{ route(Route::currentRouteName())}}" data-language="uk">Ukrainian</a></li>

                            </ul>

{{--                            @include('partials.languageSelector')--}}

                        </div>
                    @show
                </div>
            </div>
        </div>
  </header>
    <div class="border" id="border" >  </div>
    <div class="container">

        <div class="row ">
            <div class="col-md-2 bg-menu"> @yield('menu') </div>
            <div class="col-md-10" id = "content"> @yield('content') </div>
        </div>
    </div>
    {{-- @endsection --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{--   <script src="{{ asset('js/local/flag_ses.js') }}"></script>--}}
</body>
</html>
