@extends ('layout.base_old')

@section('title')
    Input pictures
@endsection

@section('css1') <link rel="stylesheet" href="{{ asset('/css/admin/styles_admin_panel.css') }}">@show


<head>
    <meta charset="UTF-8">
    <title> @section('title')
            Input pictures
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


{{--@section('content')   @endsection--}}
@section('menu')
    <div class="list-group">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action" id="list-group-item">Home</a>
        <a href="{{ route('vacation') }}" class="list-group-item list-group-item-action" id="list-group-item">Vacation</a>
        <div class="dropdown">
            <a href="#" class="list-group-item list-group-item-action" id="list-group-item" data-bs-toggle="dropdown">
                Pictures
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item list-group-item-action" href="{{ route('admin.user.picture.show', 125) }}">Show</a></li>
                <li><a class="dropdown-item list-group-item-action" href="{{ route('admin.user.picture.create') }}">Create</a></li>
                <li><a class="dropdown-item list-group-item-action" href="{{ route('admin.user.picture.store') }}">Update</a></li>
                <li><a class="dropdown-item list-group-item-action" href="{{ route('admin.user.picture.destroy', 2000) }}">Delete</a></li>
            </ul>
        </div>
        <a href="{{ route('admin.user.index') }}" class="list-group-item list-group-item-action" id="list-group-item">User</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" id="list-group-item">Logout</a>
    </div>
@endsection
