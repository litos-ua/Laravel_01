@extends ('admin.admin_user')

@section('title')
    Create pictures
@endsection

@section('css1') <link rel="stylesheet" href="{{ asset('/css/admin/admin_panel.css') }}">@show

@section('content')

        <script>
            $(document).ready(function() {
             $("#add_picture").submit(function(event) {
                    event.preventDefault(); // Prevent the default form submission behavior

                    // Serialize the form data
                    var formData = $(this).serialize();

                    // This is AJAX request to submit the form data
                    $.ajax({
                        type: "POST",
                        url: $(this).attr("action"),
                        data: formData,
                        dataType: "json",
                        success: function(response) {
                            // Handle the successful response
                            alert("Picture added successfully!"); // You can show a success message or do something else here
                            // Reset the form after successful submission
                            $("#add_picture")[0].reset();
                        },
                        error: function(xhr, status, error) {
                            // Handle the error response
                            var errorMessage = xhr.responseJSON.message;
                            alert(errorMessage); // Show the error message to the user
                        }
                    });
                });
            });
        </script>

{{--    <div class="container">--}}
<div class="card">
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96-custom shadow-xl rounded p-3">
            @if (Auth::check())
                <h1 class="text-3xl font-medium font-size-sm header-title">Picture table   User:  {{ Auth::user()->name }}</h1>
            @else
                <h1 class="text-3xl font-medium font-size-sm header-title">Picture table    User: Guest</h1>
            @endif
                <table class="grid">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Filename</th>
                        <th>Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vacationsWithPictures as $row)
                        <tr>
                            <td>{{ $row->id_pic }}</td>
                            <td>{{ $row->category }}</td>
                            <td>{{ $row->filename }}</td>
                            <td>{{ $row->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="pagination justify-content-center mt-4">
                        {{ $vacationsWithPictures->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection

