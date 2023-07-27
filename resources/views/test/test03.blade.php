<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> @section('title') Welcome!@endsection </title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    @section('css1') <link rel="stylesheet" href="{{ asset('/css/test/styles_test_03.css') }}">@show
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        #logo{
            width: 50px;
        }
        .card{
            max-width: 500px;
        }
        header{
            background: #7f94b4;
            padding: 10px 0px;
            position: fixed;
            width: 100%;
        }
        .bg-menu{
            background: #7f94b4;
        }
        .border{
            margin-bottom: 20px;
            /*position: fixed;*/
            height: 60px;
            background: white;
        }
        button{
            background-color: #7f94b4 !important;
            color: white !important;
        }
        button:hover{
            background: #3d619a;
        }
        #registration_form_email{
            margin-left: 37px;
            width: 300px;
        }

        #registration_form_plainPassword{
            margin-left: 10px;
            width: 300px;
        }

        #registration_form_agreeTerms{
            margin-left: 10px;
        }

        #username{
            width: 300px;
        }
        #password{
            width: 300px;
        }

    </style>


</head>
<body>
{{-- @section('body') --}}
<header>
    <<div class="container">
        <div class="row ">
            <div class="col-md-2">
                <a href="/"><img id = "logo" src = "{{ asset('pictures/WFox_01a.jpg') }}" alt="Альтернативний текст"/></a>
            </div>
            <div class="col-md-10 right">
                @section('header')
                    <div class="text-end">
                        <button type="button"
                                class="btn btn-outline-light me-2"
                                onclick="window.location.href= '/login'">
                            Login
                        </button>
                        <button type="button"
                                class="btn btn-warning"
                                onclick="window.location.href= '/register'">
                            Sign-up
                        </button>
                        <button type="button"
                                class="btn btn-outline-light me-2"
                                onclick="window.location.href= '/logout'">
                            Log-out
                        </button>
                    </div>
                @show
            </div>
        </div>
    </div>
</header>
<div class="border" id="border" >  </div>
<div class="container">

    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">City</label>
            <input type="text" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">State</label>
            <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
    <br>



    @section('simpleGrid')
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
                    <td>{{ $row->id_cat }}</td>
                    <td>{{ $row->category }}</td>
                    <td>{{ $row->filename }}</td>
                    <td>{{ $row->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
    @section('dinamicGrid')
        <table class="grid">
            <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($vacationsWithPictures as $row)
                <tr>
                    @foreach ($row->toArray() as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    @show




    @section('simpleJSON')
        <pre>
{{--            {{ json_encode($vacationsWithPictures, JSON_PRETTY_PRINT) }}--}}

            {!! json_encode($vacationsWithPictures, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
        </pre>
    @show

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
