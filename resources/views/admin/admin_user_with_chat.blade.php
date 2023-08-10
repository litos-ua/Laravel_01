@extends ('admin.admin_user')

{{--@section('css1') <link rel="stylesheet" href="{{ asset('/css/admin/styles_admin_panel.css') }}">@show--}}


{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>--}}
{{--        @section('title')  Input picture  @endsection--}}
{{--    </title>--}}
{{--    <link rel="icon"--}}
{{--          href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
{{--    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">--}}
{{--    <link rel="stylesheet" href="{{ asset('/css/admin/styles_admin_panel.css') }}">--}}

{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"--}}
{{--            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--</head>--}}

@section('menu')
    <div class="list-group">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action" id="list-group-item">Home</a>
        <a href="{{ route('admin.user.index') }}" class="list-group-item list-group-item-action" id="list-group-item">Home admin</a>
        <a href="{{ route('vacation') }}" class="list-group-item list-group-item-action" id="list-group-item">Vacation</a>
        <div class="dropdown">
            <a href="#" class="list-group-item list-group-item-action" id="list-group-item" data-bs-toggle="dropdown">
                Pictures
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item list-group-item-action"
                       href="{{ route('super.user.picture.index') }}">Index</a></li>
                <li><a class="dropdown-item list-group-item-action"
                       href="{{ route('super.user.picture.create') }}">Create</a></li>
                <li><a class="dropdown-item list-group-item-action"
                       href="{{ route('super.user.picture.edit',\App\Models\Picture::first()) }}">Update</a></li>
                <li><a class="dropdown-item list-group-item-action"
                       href="{{ route('super.user.picture.destroy', 2000) }}">Delete</a></li>
            </ul>
        </div>
        <a href="{{ route('admin.user.create') }}" class="list-group-item list-group-item-action" id="list-group-item">User</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" id="list-group-item">Logout</a>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>Admin profile {{ __('      Email:  ')}} {{ Auth::user()->email }}</p>
{{--                        <p>{{ __('User:  ')}} {{ Auth::user()->name }}{{ __('  Profile  ')}}</p>--}}
{{--                        <p>{{ __('Email:  ')}} {{ Auth::user()->email }}{{ __('       Status:  ')}} {{ Auth::user()->status }}</p>--}}
{{--                        @foreach(Auth::user()->phones as $phone)--}}
{{--                            <p>{{ __('Telephone:  ')}} {{ $phone->phonenumber }}</p>--}}
{{--                        @endforeach--}}
                    </div>

                    <div class="card-body">

                        <h3>Admin Incoming Messages</h3>
                        <div>
                            @foreach($messages as $message)
                                <div class="message">
                                    <strong>ID:</strong> {{ $message->sender->id }}<strong>&nbsp&nbsp&nbspSender:</strong> {{ $message->sender->name }}
                                    <strong>&nbsp&nbsp&nbspSent at:</strong> {{ $message->created_at }}<br>
{{--                                    <strong>Receiver:</strong> {{ $message->receiver->name }} <br>--}}
                                    <strong>Content:</strong> {{ $message->content }} <br>
{{--                                    <strong>Sent at:</strong> {{ $message->created_at }}--}}
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="pagination justify-content-center mt-4">
                                        {{ $messages->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('user.sendMessage') }}">
                            @csrf

                            <div class="flex justify-center">
                                <textarea name="message" class="text-area w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl
                                @error('text') border-red-500 @enderror" placeholder="Your message..." spellcheck="false"></textarea>
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