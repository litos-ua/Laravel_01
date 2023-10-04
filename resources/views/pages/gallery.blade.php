@extends ('layout.base')

@section('css1') <link rel="stylesheet" href="{{ asset('/css/styles_gal.css') }}">@endsection

@section('title') <title> Gallery </title> @endsection



{{--{% block content1 %}--}}
@section('content1')
<a href="/vacation" class="navbar-brand d-flex align-items-center responsive-input">
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
    <strong>{{__('messages.gal_vac_but')}}</strong>
</a>
{{--{% endblock %}--}}
@endsection

@section('languageSelector')
    <!-- Language Selector Dropdown -->
    <div class="dropdown language-selector">
        <button class="btn btn-secondary dropdown-toggle responsive-input" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('messages.lang_but')}}
        </button>
        <img class="flag-icon" src="{{ asset(config('my_config.path_en_flags')) }}" alt="Flag" data-language="en">
        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),['vacCat' => $vacCat]) }}" data-language="en">English</a></li>
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),['vacCat' => $vacCat]) }}" data-language="pl">Polish</a></li>
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),['vacCat' => $vacCat]) }}" data-language="uk">Ukrainian</a></li>
        </ul>
    </div>
@endsection


{{--{% block mainContent %}--}}
@section('mainContent')
<main>

    <section class="py-3 text-center container">
        <div class="row row-h py-lg-1">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-normal">{{__('messages.fio')}} </h1>
                <p class="lead {#  text-muted #} font-weight-bold">{{__('messages.vc_album')}}   {{__("categories.$vacName") }}</p>

            </div>
        </div>
    </section>

    {{-- Блок вывода фотографий --}}
    <div class="container">

        <div class="row justify-content-center" id="pic_gallery_div">

            @foreach ($pictures as $picture)

            <div class="col-2" id="card_gallery">

                @php
                    $filesGet = $picture->filename . '$' . $picture->title . '$' . $picture->category;
                @endphp



                <a href="{{ route('picture', ['currentFileName' => $filesGet]) }}">
                        <img class="img-fluid"
                             id="pic_of_gallery"
                             src="{{ asset(config('my_config.path_small_images') . $picture->filename) }}"
                             title="{{ $picture->description }}"
                             alt="Vacation image">
                    </a>

            </div>
            @endforeach
        </div>
    </div>
    {{-- Output pagination links --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="pagination justify-content-center mt-4">
                    {{ $pictures->links() }}
                </div>
            </div>
        </div>
    </div>

</main>

    <script src="{{ asset(config('my_config.path_background_images')) }}"></script>

{{--{% endblock %}--}}
@endsection

