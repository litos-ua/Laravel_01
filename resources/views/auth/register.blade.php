@extends ('layout.base_old')

@section('title')
    Insert picture
@endsection




<head>
    <meta charset="UTF-8">
    <title> @section('title')
            Welcome!
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
    <div class="card">

        <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
            <div class="bg-white w-96 shadow-xl rounded p-5">
                <h1 class="text-3xl font-medium">{{ __('auth.registration') }}</h1>

                <form action="{{ route("register_process") }}" class="space-y-5 mt-5 rounded" method="POST">
                    {{--register_process--}}
                    @csrf

                    <input name="name" id="username" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror"
                           placeholder="{{ __('auth.user_name') }}"/>

                    @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="email" id="email" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror"
                           placeholder="Email"/>

                    @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password" id="password" type="password"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror"
                           placeholder="{{ __('auth.password') }}"/>

                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password_confirmation" id="password_confirmation" type="password"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('password_confirmation') border-red-500 @enderror"
                           placeholder="{{ __('auth.conf_pas') }}"/>

                    @error('password_confirmation')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

{{--                    <div class="form-check">--}}
{{--                        <input name="agree_terms" id="registration_form_agreeTerms" class="form-check-input"--}}
{{--                               type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>--}}
{{--                        <label class="form-check-label" for="terms">--}}
{{--                            &nbsp&nbspI agree to the terms and conditions--}}
{{--                        </label>--}}
{{--                    </div>--}}

                    <div class="form-check">
                        <input name="agreeTerms" id="registration_form_agreeTerms" class="form-check-input @error('agreeTerms') border-red-500 @enderror"
                               type="checkbox" name="agreeTerms" id="agreeTerms" {{ old('terms') ? 'checked' : '' }}>
                        <label class="form-check-label" for="terms">
                            &nbsp&nbsp{{ __('auth.agree') }}
                        </label>
                        @error('agreeTerms')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="have_account">
                        <a href="{{ route("login") }}" id="exist_account"
                           class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">{{ __('auth.sign-in') }}</a>
                    </div>

                    <button type="submit" id="signup-button"
                            class="text-center w-full bg-blue-900 rounded text-white py-3 font-medium">{{ __('auth.sign-up') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
