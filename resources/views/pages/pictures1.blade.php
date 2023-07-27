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
    @section('title') <title> Carusel </title>@show
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    @section('css1') <link rel="stylesheet" href="{{ asset('/css/styles_pic.css') }}"> @show
    {{---Подключение JS ниже мешало работе toggler (меню только сворачивалось, но не разворачивалось)-}}
    {{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
    <script src="{{ asset('js/app.js') }}"></script>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.108.0">
        {{--        @section('title')    <title>Album example · Bootstrap v5.3</title>  @show --}}

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    </head>

</head>

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

<body>
<h1>Moi Wakacji {{ $fileTitleVac1[1] }}</h1>
<header> </header>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                {{-- Карусель --}}
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner img-fluid">

                        @foreach($picturesThisVacation as $slide)
{{--                            @dd($slide->filename)--}}
                            @if ($slide->filename == $fileTitleVac1[0])
                                @php
                                    $classCarousel = "carousel-item active";
                                @endphp
                            @else
                                @php
                                    $classCarousel = "carousel-item";
                                @endphp
                            @endif
{{--                        @dd($classCarousel)--}}
                        <div class="{{$classCarousel}}" id="div-img-car" data-bs-interval="10000">
                            <img src="{{ asset('/pictures/images/' . $slide->filename) }}"
                                 class="d-block  {# w-100 #} "
                                 id="div-img-car1"
                                 alt="...">
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

                <a class="back_pic_btn" href="{{ asset('/gallery/' . $fileTitleVac1[2]) }}">
                    <button type="button"
                            class="btn btn-primary btn-lg btn-block"
                            id = "btn_back_gallery"
                            name="vac_picture"
                            value="{{ asset('/gallery/' . $fileTitleVac1[2]) }}"
                            onclick="window.location.href= {{ 'gallery' . $fileTitleVac1[2]}}"
                    >Back to gallery {{  $fileTitleVac1[1] }}
                    </button>
                </a>
            </div>
        </div>
    </div>
</main>

</body>
</html>
