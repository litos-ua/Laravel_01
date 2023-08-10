@extends ('layout.base_old')

@section('title')
    User account
@endsection

@section('css1') <link rel="stylesheet" href="{{ asset('/css/admin/styles_user_panel.css') }}">@show


<head>
    <meta charset="UTF-8">
    <title> @section('title')
            Users
        @endsection </title>
    <link rel="icon"
          href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="{{ asset('/css/admin/styles_admin_panel.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
@section('menu')
    <div class="list-group">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action" id="list-group-item">Home</a>
        <a href="{{ route('user.edit') }}" class="list-group-item list-group-item-action" id="list-group-item">User</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" id="list-group-item">Logout</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>{{ __('User:  ')}} {{ Auth::user()->name }}{{ __('  Profile  ')}}</p>
                        <p>{{ __('Email:  ')}} {{ Auth::user()->email }}{{ __('       Status:  ')}} {{ Auth::user()->status }}</p>
                        @foreach(Auth::user()->phones as $phone)
                            <p>{{ __('Telephone:  ')}} {{ $phone->phonenumber }}</p>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name', $user->name) }}" required autocomplete="name"
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phonenumber"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phonenumber" type="text"
                                           class="form-control @error('phonenumber') is-invalid @enderror"
                                           name="phonenumber" value="{{ old('phonenumber', isset(Auth::user()->phones[0]) ? Auth::user()->phones[0]->phonenumber : '') }}"
                                           required  pattern="^\+[0-9]{12}$"
                                           title="Please enter a valid phone number starting with a '+' sign followed by ten digits.">
                                    @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update Profile') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <form method="POST" action="{{ route('user.changePassword') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password" required autocomplete="current_password">

                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" required autocomplete="new_password">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                <div class="col-md-6">
                                <input id="new_password_confirmation" type="password" class="form-control"
                                       name="new_password_confirmation" required autocomplete="new_password_confirmation">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Change password') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <form method="POST" action="{{ route('user.sendMessage') }}">
                            @csrf

                            <div class="flex justify-center">
                                <textarea name="message" class="text-area w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl @error('text') border-red-500 @enderror" placeholder="Your comment..." spellcheck="false"></textarea>
                            </div>

                            @error('text')
                            <p class="text-red-500">Error</p>
                            @enderror

                            <div class="flex justify-center text-area-button-div">
                                <button type="submit" class="text-area-button btn btn-primary">Send</button>
                            </div>
                        </form>

                        <div class="container">
                            <!-- Display success message if it exists in the session -->
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Display error message if it exists in the session -->
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <!-- ... rest of the form ... -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
