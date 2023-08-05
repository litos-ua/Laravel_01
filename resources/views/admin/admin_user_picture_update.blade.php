@extends ('admin.admin_user')

@section('title')
    Update pictures
@endsection

@section('css1') <link rel="stylesheet" href="{{ asset('/css/admin/admin_panel.css') }}">@show

@section('content')

        <script>
            // $(document).ready(function() {
            //  $("#add_picture").submit(function(event) {
            //         event.preventDefault(); // Prevent the default form submission behavior
            //
            //         // Serialize the form data
            //         var formData = $(this).serialize();
            //
            //         // This is AJAX request to submit the form data
            //         $.ajax({
            //             type: "POST",
            //             url: $(this).attr("action"),
            //             data: formData,
            //             dataType: "json",
            //             success: function(response) {
            //                 // Handle the successful response
            //                 alert("Picture added successfully!"); // You can show a success message or do something else here
            //                 // Reset the form after successful submission
            //                 $("#add_picture")[0].reset();
            //             },
            //             error: function(xhr, status, error) {
            //                 // Handle the error response
            //                 var errorMessage = xhr.responseJSON.message;
            //                 alert(errorMessage); // Show the error message to the user
            //             }
            //         });
            //     });
            // });
            $(document).ready(function() {
                $("#add_picture").submit(function(event) {
                    event.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        type: "POST", // Change this to "PUT"
                        url: $(this).attr("action"),
                        data: formData + '&_method=PUT', // Include _method field for Laravel to recognize PUT
                        dataType: "json",
                        success: function(response) {
                            alert("Picture updated successfully!");
                            $("#add_picture")[0].reset();
                        },
                        error: function(xhr, status, error) {
                            var errorMessage = xhr.responseJSON.message;
                            alert(errorMessage);
                        }
                    });
                });
            });
        </script>

{{--    <div class="container">--}}
<div class="card">
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            @if (Auth::check())
                <h1 class="text-3xl font-medium header-title">Update pictures   User:  {{ Auth::user()->name }}</h1>
            @else
                <h1 class="text-3xl font-medium header-title">Update pictures    User: Guest</h1>
            @endif
                <form class="space-y-5 mt-5 rounded"  id ="add_picture"   action="{{ route('super.user.picture.update', ['picture' => $picture]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" class="w-full h-12 border border-gray-800 rounded px-3 @error('id_pic') border-red-500 @enderror"
                           placeholder="Id" id="id_pic" name="id_pic" required>
                    @error('id_pic')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

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
                <!-- Display success message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>
    </div>
</div>
@endsection

