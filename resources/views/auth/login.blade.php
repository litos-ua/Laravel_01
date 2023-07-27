@extends ('layout.base_old')

@section('title')
    Authorisation
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
                <h1 class="text-3xl font-medium">Login</h1>

                <form action="{{ route("login_process") }}" class="space-y-5 mt-5 rounded" method="POST">
                    @csrf

                    <input name="email" id="email" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror"
                           placeholder="Email"/>

                    @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password" id="password" type="password"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror"
                           placeholder="Пароль"/>

                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <div>
                        <a href="{{ route("forgot") }}" id="exist_account"
                           class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Forget password?</a>
                    </div>

                    <div>
                        <a href="{{ route("register") }}" id="exist_account"
                           class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Sign Up</a>
                    </div>

                    <button type="submit" id="signup-button"
                            class="text-center w-full bg-blue-900 rounded text-white py-3 font-medium">Sign In
                    </button>
                </form>
            </div>
        </div>

@endsection
