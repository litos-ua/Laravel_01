@extends ('layout.base')

@section('css1') <link rel="stylesheet" href="{{ asset('/css/styles_pic.css') }}">@show

@section('title') <title> Carusel </title> @endsection

@if(isset($fileTitleVac))
{{--    <p>  {{$fileTitleVac}} </p>--}}
    @php
        $fileTitleVac1= explode('$',$fileTitleVac);
        $classCarousel = '';
    @endphp

{{--    <p>  {{$fileTitleVac1[0]}} </p>--}}
{{--    <p>  {{$fileTitleVac1[1]}} </p>--}}
{{--    <p>  {{$fileTitleVac1[2]}} </p>--}}
@else
    <p> Variable $fileName isn't exist. </p>
@endif

{{--<ul>--}}
{{--    @foreach((array) $picturesThisVacation as $pictures)--}}
{{--        <li> {{$pictures->filename}} </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}



@section('h1') <h1>{{__('messages.pic_my_vacation')}} &nbsp: &nbsp {{__('messages.pic_search_term')}} &nbsp: &nbsp {{ $fileTitleVac1[1] }}</h1>@show

@section('contentHeader1') @endsection
@section('languageSelector') @endsection
@section('contentHeader2') @endsection

@section('mainContent')
    <main>
        {{--  {% for slide in picturesThisVacation %} --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    {{-- Карусель --}}
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner img-fluid">

                          @foreach($picturesThisVacation as $slide)
                                @if ($slide->filename == $fileTitleVac1[0])
                                    @php
                                        $classCarousel = "carousel-item active";
                                    @endphp
                                @else
                                    @php
                                        $classCarousel = "carousel-item";
                                    @endphp
                                @endif

                            <div class="{{$classCarousel}}" id="div-img-car" data-bs-interval="10000">
                                <img src="{{ asset(config('my_config.path_images') . $slide->filename) }}"
{{--                                <img src="https://ru.wikipedia.org/wiki/%D0%A5%D0%B0%D1%80%D1%8C%D0%BA%D0%BE%D0%B2#/media/%D0%A4%D0%B0%D0%B9%D0%BB:Derzhprom_building.JPG"--}}
                                    class="d-block"
                                    id="div-img-car1"
                                    alt="Image">
                            </div>

                          @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                </div>
                <div class="btn-group">

{{--                    <a class="back_pic_btn" href="{{ asset('/gallery/' . $fileTitleVac1[2]) }}">--}}
                    <a class="back_pic_btn" href="{{ asset('/vacation')}}">
                        <button type="button"
                            class="btn btn-primary btn-lg btn-block"
                            id = "btn_back_gallery"
                            name="vac_picture"
{{--                            value="{{ asset('/gallery/' . $fileTitleVac1[2]) }}"--}}
                            value="{{ asset('/vacation')}}"
{{--                            onclick="window.location.href= {{ 'gallery' . $fileTitleVac1[2]}}"--}}
                            onclick="window.location.href= {{'/vacation'}}"
                            >{{__('messages.pic_back_gal_vac')}}

                        </button>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
