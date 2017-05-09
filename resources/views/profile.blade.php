<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Profiel - '.Auth::user()->username))
    @php
    /*
    User Information
        -Username
        -Email
        -Address

    Configuration
        -Edit Password
        -Edit Username
        -Edit Adress
        -Edit Email

    Reservations Div
        -Courses Reserved
        -Tables Reserved
    */
    @endphp
@include('layouts.footer')
</body>
</html>

