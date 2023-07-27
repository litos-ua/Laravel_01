<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> @section('title') Welcome!@endsection </title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="{{ asset('/css/styles_auth.css') }}">
{{--    @section('stylesheets')--}}

        <script src="{{ asset('js/app.js') }}"></script>

{{--    <style>--}}
{{--        #logo{--}}
{{--            width: 50px;--}}
{{--        }--}}
{{--        .card{--}}
{{--            max-width: 700px;--}}
{{--        }--}}
{{--        header{--}}
{{--            background: #7f94b4;--}}
{{--            padding: 10px 0px;--}}
{{--            position: fixed;--}}
{{--            width: 100%;--}}
{{--        }--}}
{{--        .bg-menu{--}}
{{--            background: #7f94b4;--}}
{{--        }--}}
{{--        .border{--}}
{{--            margin-bottom: 20px;--}}
{{--            /*position: fixed;*/--}}
{{--            height: 60px;--}}
{{--            background: white;--}}
{{--        }--}}
{{--        button{--}}
{{--            background-color: #7f94b4 !important;--}}
{{--            color: white !important;--}}
{{--        }--}}
{{--        button:hover{--}}
{{--            background: #3d619a;--}}
{{--        }--}}
{{--        /*#registration_form_email{*/--}}
{{--        /*    margin-left: 37px;*/--}}
{{--        /*    width: 500px;*/--}}
{{--        /*}*/--}}

{{--        /*#registration_form_plainPassword{*/--}}
{{--        /*    margin-left: 10px;*/--}}
{{--        /*    width: 350px;*/--}}
{{--        /*}*/--}}

{{--        #registration_form_agreeTerms{--}}
{{--            margin-left: 55px;--}}
{{--        }--}}

{{--        #username{--}}
{{--            width: 500px;--}}
{{--            margin-left: 55px;--}}
{{--        }--}}

{{--        #email{--}}
{{--            width: 500px;--}}
{{--            margin-left: 55px;--}}
{{--        }--}}

{{--        #password{--}}
{{--            width: 500px;--}}
{{--            margin-left: 55px;--}}
{{--        }--}}

{{--        #password_confirmation{--}}
{{--            width: 500px;--}}
{{--            margin-left: 55px;--}}
{{--        }--}}

{{--        .variant {--}}
{{--            display: flex;--}}
{{--        }--}}

{{--        #have_account{--}}
{{--            font-size:1.4vw; --}}{{----Масштабируем текст--}}
{{--        }--}}

{{--        #signup-button{--}}
{{--            display: flex; --}}{{--Justify text center--}}
{{--            align-items: center; --}}{{--Justify text center--}}
{{--            justify-content: center; --}}{{--Justify text center--}}
{{--            font-size:1.4vw; --}}{{--Масштабируем текст кнопки--}}
{{--            width: 250px;--}}
{{--            height: 70px;--}}
{{--            margin: auto;--}}

{{--        }--}}

{{--        #exist_account{--}}
{{--            display: flex; --}}{{--Justify text center--}}
{{--            align-items: center; --}}{{--Justify text center--}}
{{--            justify-content: center; --}}{{--Justify text center--}}
{{--        }--}}

{{--        h1 {--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        form {--}}
{{--            background-color: #95999c;--}}
{{--            padding-bottom: 15px;--}}
{{--            padding-top: 20px;--}}
{{--        }--}}

{{--    </style>--}}
{{--    @show--}}

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="{{ asset('js/app.js') }}"></script>

   </head>
   <body>
   {{-- @section('body') --}}
  <header>
        <div class="container">
            <div class="row ">
                <div class="col-md-2">
                    <a href="/"><img id = "logo" src = "{{ asset('pictures/back/WFox_01a.jpg') }}" alt="Альтернативний текст"/></a>
                </div>
                <div class="col-md-10 right">
                    @section('header')

                        <div class="text-end">
                        @if (Auth::check())
                            <button type="button"
                                    class="btn btn-outline-light me-2"
                                    onclick="window.location.href= '/logout'">
                                Logout
                        @else
                            <button type="button"
                                    class="btn btn-outline-light me-2"
                                    onclick="window.location.href= '/login'">
                                Login
                            </button>
                                @endif

                            <button type="button"
                                    class="btn btn-warning"
                                    onclick="window.location.href= '/register'">
                                Sign-up
                            </button>

                            </button>
                        </div>
                    @show
                </div>
            </div>
        </div>
  </header>
    <div class="border" id="border" >  </div>
    <div class="container">

        <div class="row ">
            <div class="col-md-2 bg-menu"> {{--@yield()'menu') --}} </div>
            <div class="col-md-10" id = "content"> @yield('content') </div>
        </div>
    </div>
    {{-- @endsection --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
