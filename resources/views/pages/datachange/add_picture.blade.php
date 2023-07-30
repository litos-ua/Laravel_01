@extends ('layout.base_old')

@section('title')
    Input pictures
@endsection

@section('css1') <link rel="stylesheet" href="{{ asset('/css/datachange/styles_add_picture.css') }}">@show


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


@section('content')
    <script>
        $(document).ready(function() {
            $("#add_picture").submit(function (event) {
                event.preventDefault(); // Prevent the default form submission behavior
                // Target the form using its id
                $("#add_picture").submit(function (event) {
                    event.preventDefault(); // Prevent the default form submission behavior

                    // Serialize the form data
                    var formData = $(this).serialize();

                    // Make an AJAX request to submit the form data
                    $.ajax({
                        type: "POST",
                        url: $(this).attr("action"),
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            // Handle the successful response
                            alert("Picture added successfully!"); // You can show a success message or do something else here
                            // Reset the form after successful submission
                            //$("#add_picture")[0].reset();
                        },
                        error: function (xhr, status, error) {
                            // Handle the error response
                            var errorMessage = xhr.responseJSON.message;
                            alert(errorMessage); // Show the error message to the user
                        }
                    });
                });
            });
        });
    </script>


{{--    <div class="container">--}}
<div class="card">

    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Input pictures</h1>
                <form class="space-y-5 mt-5 rounded"  id ="add_picture"   action="{{ route('insert.picture') }}" method="POST">
                    @csrf
                        <input type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('filename') border-red-500 @enderror"
                            placeholder="Filename" id="filename" name="filename" required>
                            @error('filename')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                        <input type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror"
                            placeholder="Title" id="title" name="title" required>
                            @error('filename')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                        <input type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('description') border-red-500 @enderror"
                            placeholder="Description" id="description" name="description" required>
                            @error('description')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                        <input type="number" class="w-full h-12 border border-gray-800 rounded px-3 @error('category') border-red-500 @enderror"
                            placeholder="Category" id="category" name="category" required>
                            @error('category')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                        <input type="number" class="w-full h-12 border border-gray-800 rounded px-3 @error('fototype') border-red-500 @enderror"
                            placeholder="Fototype" id="fototype" name="fototype" required>
                            @error('fototype')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                        <button type="submit" {{--class ="btn btn-primary" type="submit"--}} id="signup-button"
                                class="text-center w-full bg-blue-900 rounded text-white py-3 font-medium">Submit</button>

                </form>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('menu')
    <div class="list-group">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action" id="list-group-item">Home</a>
        <a href="{{ route('vacation') }}" class="list-group-item list-group-item-action" id="list-group-item">Vacation</a>
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action"id="list-group-item" >Pictures</a>
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action" id="list-group-item">User</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" id="list-group-item">Logout</a>
    </div>
@endsection
