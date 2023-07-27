@extends ('layout.base')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@endsection

@section('title') <title> Home page </title> @endsection


@section('content1')
    <a href="/vacation" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg"
             width="20" height="20"
             fill="none" stroke="currentColor"
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="2" aria-hidden="true"
             class="me-2"
             viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
            <circle cx="12" cy="13" r="4"/>
        </svg>
        <strong>{{__('messages.album')}}</strong>
    </a>
@endsection

@section('content2')
    <div class="main_rb">
        {{__('messages.vc_time')}}
    </div>
@endsection




@section('languageSelector')
    <!-- Language Selector Dropdown -->
    <div class="dropdown language-selector">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('messages.lang_but')}}
        </button>
        <img class="flag-icon" src="{{ asset('/pictures/local/flags/english-flag.png') }}" alt="Flag" data-language="en">
        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName()) }}" data-language="en">English</a></li>
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName()) }}" data-language="pl">Polish</a></li>
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName()) }}" data-language="uk">Ukrainian</a></li>
        </ul>
    </div>
@endsection


{{--@section('footer')--}}
{{--    <footer class="text-muted py-5" id="footer">--}}
{{--        <div class="container" id="divfooter">--}}
{{--            <p class="float-end mb-1">--}}
{{--                <a href="#">Back to top</a>--}}
{{--            </p>--}}
{{--            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>--}}
{{--            <p class="mb-0">New to Bootstrap?--}}
{{--                <a href="/">Visit the homepage</a> or read our--}}
{{--                <a href="https://polsat.pl">getting started guide</a>.</p> {# ../getting-started/introduction/ #}--}}
{{--        </div>--}}
{{--    </footer>--}}
{{--@endsection--}}


