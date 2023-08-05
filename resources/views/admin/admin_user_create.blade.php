@extends ('layout.base_old')

@section('css1') <link rel="stylesheet" href="{{ asset('/css/admin/styles_admin_panel.css') }}">@show


<head>
    <meta charset="UTF-8">
    <title>
        @section('title')  Input picture  @endsection
    </title>
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


{{--@section('content')   @endsection--}}
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
{{--                       href="{{ route('root.user.picture.input1', \App\Models\Picture::first()) }}">Update1</a></li>--}}
{{--                <li><a class="dropdown-item list-group-item-action"--}}
                       href="{{ route('super.user.picture.destroy', 2000) }}">Delete</a></li>
            </ul>
        </div>
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action" id="list-group-item">User</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" id="list-group-item">Logout</a>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
            <div class="bg-white w-96-custom shadow-xl rounded p-3">
                @if (Auth::check())
                    <h1 class="text-3xl font-medium font-size-sm header-title">User table   User:  {{ Auth::user()->name }}</h1>
                @else
                    <h1 class="text-3xl font-medium font-size-sm header-title">User table    User: Guest</h1>
                @endif
                <table class="grid">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
