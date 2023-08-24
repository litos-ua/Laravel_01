@extends ('layout.base')

@section('css1') <link rel="stylesheet" href="{{ asset('/css/styles_vac.css') }}">@endsection

@section('title') <title> {{__('messages.vc_page')}} </title> @endsection

{{--{% block content1 %}--}}
@section('content1')
<a href="/home" class="navbar-brand d-flex align-items-center">
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
    <strong>{{__('messages.home_but')}}</strong>
</a>
{{--{% endblock %}--}}
@endsection

@section('languageSelector')
    <!-- Language Selector Dropdown -->
    <div class="dropdown language-selector">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('messages.lang_but')}}
        </button>
        <img class="flag-icon" src="{{ asset(config('my_config.path_en_flags')) }}" alt="Flag" data-language="en">
        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),['vacCat' => 23]) }}" data-language="en">English</a></li>
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),['vacCat' => 23]) }}" data-language="pl">Polish</a></li>
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),['vacCat' => 23]) }}" data-language="uk">Ukrainian</a></li>

        </ul>
    </div>
@endsection


{{--{% block mainContent %}--}}
@section('mainContent')
<main>

    <section class="py-3 text-center container" id="container2">
        @if($alert = session()->pull('alert'))
            <div class = "alert alert-success mb-0 rounded-0 text-center small py-2">
                {{$alert}}
            </div>
         @endif
                 <div class="row row-h py-lg-1">
                     <div class="col-lg-6 col-md-8 mx-auto">
                         <h1 class="fw-normal">{{__('messages.vc_album')}} {{ $selectedLanguage }}</h1>
                         <p class="lead {#  text-muted #} font-weight-bold">{{__('messages.vc_time')}}</p>
                     </div>
                 </div>
    </section>

    <div class="album py-3 bg-light" id="container3">
        <div class="container">
            @if (isset($vacations))
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="container4">
                         @foreach ($vacations as $vacation)
                         <div class="col">
                             <div class="card shadow-sm">
                                 <svg class="bd-placeholder-img card-img-top"
                                      width="100%" height="225"
                                      xmlns="http://www.w3.org/2000/svg"
                                      role="img" aria-label="Placeholder: Thumbnail"
                                      preserveAspectRatio="xMidYMid slice"
                                      focusable="false">

                                     <a href="{{ route('gallery',['vacCat' => $vacation->id_cat]) }}">
                                     <image href="{{ asset(config('my_config.path_title_images') . $vacation->filename) }}"
                                       alt="Альтернативний текст"
                                       width="100%"/>
                                      </a>
                                      <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{__('messages.vc_name')}}</text>
                                 </svg>
                                 <div class="card-body">
                                     <p class="card-text">{{ Lang::get("categories.$vacation->category") }} </p>
                                     <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                          <a class="go_vac_gal_pic_btn" href="{{ route('gallery',['vacCat' => $vacation->id_cat]) }}">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary"
                                                name="vac_gallery"
                                                value="{{ Lang::get("categories.$vacation->category") }}"
                                                onclick="window.location.href='gallery/7'">{{__('messages.vc_view')}} {{ Lang::get("categories.$vacation->category") }}
                                            </button>
                                          </a>

                                </div>
                                <small class="text-muted">9 mins</small>
                             </div>
                         </div>
                </div>
        </div>
                  @endforeach
                  @else
                        <p> {{__('messages.vc_er_01')}} </p>
            @endif
    </div>

    </div>
    </div>
{{--    <script>--}}
{{--        var backgroundImages = [--}}
{{--            '{{ config('my_config.background_image1') }}',--}}
{{--            '{{ config('my_config.background_image2') }}',--}}
{{--            '{{ config('my_config.background_image3') }}',--}}
{{--            '{{ config('my_config.background_image4') }}',--}}
{{--            '{{ config('my_config.background_image5') }}',--}}
{{--            '{{ config('my_config.background_image6') }}',--}}
{{--            '{{ config('my_config.background_image7') }}',--}}
{{--        ];--}}
{{--        --}}
{{--         var currentImageIndex = 0; // Start with the first image--}}
{{--        --}}
{{--         function updateBackgroundImage() {--}}
{{--             console.log('Updating background image...'); // Debug line--}}
{{--        --}}
{{--             var backgroundImage = backgroundImages[currentImageIndex];--}}
{{--             $('body').fadeOut(1000, function() {--}}
{{--                 $(this).css('background-image', 'url(' + backgroundImage + ')').fadeIn(2000);--}}
{{--             });--}}
{{--        --}}
{{--             currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;--}}
{{--         }--}}
{{--        --}}
{{--         $(document).ready(function () {--}}
{{--             updateBackgroundImage(); // Initial call--}}
{{--             setInterval(updateBackgroundImage, 30000); // Change interval for testing--}}
{{--         });--}}
{{--    </script>--}}
    <script src="{{ asset(config('my_config.path_background_images')) }}"></script>
</main>
{{--{% endblock%}--}}
@endsection



