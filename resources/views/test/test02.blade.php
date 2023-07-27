@extends ('layout.base_old')

@section('title')
    Registration
@endsection


@section('content')
    <div>
        <p> Api Controller in action </p>

{{--        <script type="text/javascript">--}}
{{--            alert('Javascript подключен');--}}
{{--            //document.write(5+6);--}}
{{--            //window.alert(myDiv(70,12));--}}
{{--            function myDiv(d1, d2) {--}}
{{--                return d1 / d2;--}}
{{--            }--}}

{{--            function pow(x, n) {--}}
{{--                let result = 1;--}}

{{--                // множимо result на x n разів в циклі--}}
{{--                for (let i = 0; i < n; i++) {--}}
{{--                    result *= x;--}}
{{--                }--}}
{{--                return result;--}}
{{--            }--}}

{{--            //npov = pow(2, 3);--}}
{{--            npov = prompt('How old are you?', '');--}}
{{--            document.write(`<br>${'I am  ' + npov}<br>`);--}}
{{--            let ip = req.headers['x-forwarded-for'] || req.connection.remoteAddress ||--}}
{{--                req.socket.remoteAddress || req.connection.socket.remoteAddress;--}}
{{--            document.write(`<br>${'IP from JS  ' + ip}<br>`);--}}
{{--        </script>--}}
{{--        <h1>--------------{{$pic->title }}---------------</h1>--}}
{{--        <p>Description:************** {{ $pic->description }}**************</p>--}}
{{--        <img src="{{ $pic->filename }}" alt="Picture">--}}
        @if (isset($vacations))
            @foreach ($vacations as $vacation)
                <ul>
                    <li>{{$vacation->id_cat}}</li>
                    <li>{{$vacation->category}}</li>
                    <li>{{$vacation->filename}}</li>
                </ul>
            @endforeach
        @else
            <p> Vacation isn't define! </p>
        @endif

{{--        @if (isset($pictures))--}}
{{--            @foreach ($pictures as $picture)--}}
{{--                <ul>--}}
{{--                    <li>{{$picture->id_pic}}</li>--}}
{{--                    <li>{{$picture->category}}</li>--}}
{{--                    <li>{{$picture->title}}</li>--}}
{{--                    <li>{{$picture->filename}}</li>--}}
{{--                </ul>--}}
{{--            @endforeach--}}
{{--        @else--}}
{{--            <p> Vacation isn't define! </p>--}}
{{--        @endif--}}
        <p><b> Experiment with hasMany(Picture::class, 'category', 'id_cat')</b></p>
        @foreach ($vacationsWithPictures->except([12,14,15,19,29,30,31,32,33]) as $vacation)
            <p>Vacation ID: {{ $vacation->id_cat }}</p>
            <p>Vacation Category: {{ $vacation->category }}</p>
            <p>Pictures:</p>
            <ul>
                @foreach ($vacation->pictures as $picture)
                    <li>{{ $picture->filename }}</li>
                @endforeach
            </ul>
        @endforeach



{{--        {{$searchTerm}} <br>--}}
{{--        {{$vacCat}} <br>--}}
{{--        {{$vacName}} <br>--}}
{{--        @foreach($pictures as $picture)--}}
{{--            <div>--}}
{{--                <ul>--}}
{{--                    <li>{{$picture->title}}</li>--}}
{{--                    <li>{{$picture->description}}</li>--}}
{{--                    <li>{{$picture->filename}}</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endforeach--}}

        @if (extension_loaded('redis')) {
        <p> Redis is installed and available. </p>
        }
        @else {
        <p> Redis is not installed or not available. </p>
        }
        @endif



        <script src="{{ asset('js/test02.js') }}"></script>

@endsection
