@extends ('layout.base_old')

@section('title')
    Verification
@endsection




<head>
    <meta charset="UTF-8">
    <title> @section('title')
            Verification
        @endsection </title>
    <link rel="icon"
          href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>


@section('content')
    <div class="form-group row mb-0">
        <h3 style="margin-left: 20%">You need to verify your email address.</h3>
        <div class="col-md-8 offset-md-4 ">
            <div class="d-flex justify-content-right">
                <div>
{{--                    <a href="{{ url()->previous() }}" class="btn btn-primary" id = "btn-primary" >--}}
{{--                        {{ __('Back') }}--}}
{{--                    </a>--}}
                    <form method="GET" action="{{ redirect()->back()->getTargetUrl() }}" id="back-form">
                        <button type="submit" class="btn btn-primary" id="btn-primary">
                            {{ __('Back') }}
                        </button>
                    </form>
                </div>
                <div>
                    <form method="POST" action="{{ route('verification.send') }}" id="verification-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::id() }}">
                        <input type="hidden" name="hash" value="{{ sha1(Auth::user()->getEmailForVerification()) }}">
                        @if(session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <button type="submit" class="btn btn-primary" id="btn-primary">
                            {{ __('Verification') }}
                        </button>
                    </form>
                    <script>
                        document.getElementById('btn-primary').addEventListener('click', function() {
                            document.getElementById('verification-form').submit();
                        });
                    </script>
                </div>
            </div>

        </div>
    </div>
@endsection
