
{{--<div class="dropdown language-selector">--}}
    <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        {{__('messages.lang_but')}}
    </button>
    <img class="flag-icon" src="{{ asset('/pictures/local/flags/english-flag.png') }}" alt="Flag" data-language="en">
    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
        <li><a class="dropdown-item" href="{{ route(Route::currentRouteName())}}" data-language="en">English</a></li>
        <li><a class="dropdown-item" href="{{ route(Route::currentRouteName())}}" data-language="pl">Polish</a></li>
        <li><a class="dropdown-item" href="{{ route(Route::currentRouteName())}}" data-language="uk">Ukrainian</a></li>

    </ul>
{{--</div>--}}
