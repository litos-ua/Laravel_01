@extends ('layout.base_old')
@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-lg">
            <h2 class="text-2xl font-semibold mb-4" style="color: red">Oops! An Error Occurred</h2>
            <p>
                <div class="alert alert-danger">
                    {{ session('error_message') }}
                </div>
            </p>
            <p class="text-gray-600">Sorry, something went wrong while processing your request.</p>
            <p class="text-gray-600">Please try again later or contact the administrator for assistance.</p>
            <div class="mt-6">
                <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline">Go back</a>
            </div>
        </div>
    </div>
@endsection
