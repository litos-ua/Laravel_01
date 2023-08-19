@extends ('layout.base_old')

@section('title', 'Contact with me')

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
    @section('css_old')
        @parent
        @push('additional_styles')
            <link rel="stylesheet" href="{{ asset('/css/emails/styles_sendContactEmail.css') }}?v=2">
        @endpush
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>



@section('content')
    <h1>{{__('messages.contact_me')}}</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('contact.send') }}" method="POST" class="w-100 text-center">
        @csrf
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control text-area w-full shadow-inner
                p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl mx-auto" rows="5" required
                @error('text') border-red-500 @enderror
                placeholder="{{ __('auth.comment_1') }}" spellcheck="false">
            </textarea>

        </div>
        <button type="submit" class="btn btn-primary mx-auto" id="message-button">{{__('messages.send_but')}}</button>
    </form>
@endsection


