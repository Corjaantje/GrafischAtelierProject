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
<div class="container">
    <input type="button" class="btn btn-primary reservationBackButton"
           onclick="window.location='{{ route('profile') }}'" value="Terug naar profiel">
    <h1 class="title reservationTitles">Reservering wijzigen</h1>

    @if(isset($error))
        <h2 class="reservationTitles">{{$error}}</h2>
        @endisset
        <div class="row"><br/><br/>
            {{ Form::open(['method' => 'patch', 'route' => 'edit_reservation_action']) }}
            <p id="tafel"></p>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-4">
                    <img src="{{URL::to('/')}}/img/Reservation/imgTemp1.jpg" class="reservationImages">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-4">
                    <b>Datum:</b><br/><input type="date" name="date" value="{{$date}}"><br/><br/>
                    <b>Starttijd:</b><br/><input type="time" name="start_time" value="{{$start}}"><br/><br/>
                    <b>Eindtijd:</b><br/><input type="time" name="end_time" value="{{$end}}"><br/><br/>
                    <input type="hidden" name="id" id="id" value="{{$id}}">
                    <input type="submit" name="btnDateTime" value="Wijzigen" class="btn btn-primary">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-4">
                    <img src="{{URL::to('/')}}/img/Reservation/imgTemp2.jpg" class="reservationImages"><br><br>
                    <img src="{{URL::to('/')}}/img/Reservation/imgTemp3.jpg" class="reservationImages">
                </div>
                {{ Form::close() }}
            </div>
        </div>
</div>
@include('layouts.footer')
</body>
</html>