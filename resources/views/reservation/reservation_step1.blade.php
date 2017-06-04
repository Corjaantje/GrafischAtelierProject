<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="html-cms">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="body-cms">
@include('layouts.header', array('title'=>'Home'))
@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
<div class="container">
    <input type="button" class="btn btn-primary reservationBackButton" onclick="window.location='/'" value="Terug">
    <h1 class="title reservationTitles">Wat wilt u reserveren?</h1>
    <div class="row"><br />
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <a href="{{URL::route('reservationStep2')}}">
                <img src="{{URL::to('/')}}/img/Reservation/werkplaats.png" class="reservationImages">
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <a href="{{URL::route('courses')}}">
                <img src="{{URL::to('/')}}/img/Reservation/cursus.png" class="reservationImages">
            </a>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>