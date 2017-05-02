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
<input type="button" class="btn btn-primary" onclick="window.location='{{ route('reservationStep4') }}'" value="Terug">
<div class="container">
    <h1 class="title reservationTitles">Controleer uw reservering</h1>
    <div class="row">
        {{ Form::open(['route' => 'individualReservation_step5']) }}
        {{ Form::hidden('_token', csrf_token()) }}
        {{ Form::label('type', 'Type: '. \App\Http\Controllers\SessionController::getType()) }}<br />
        {{ Form::label('date', 'Datum: '. \App\Http\Controllers\SessionController::getDate()) }}<br />
        {{ Form::label('start_time', 'Starttijd: '. \App\Http\Controllers\SessionController::getStartTime()) }}<br />
        {{ Form::label('end_time', 'Eindtijd: '. \App\Http\Controllers\SessionController::getEndTime()) }}<br />
        <b><p id="tafel" name="table"></p></b>
        <b><p id="tafel_id" name="table_id"><script>sessionStorage.getItem('table_id')</script></p></b><br />
        <input type="submit" name="btnInsertReservation" value="Bevestig" class="btn btn-primary">
        {{ Form::close() }}
    </div>
</div>
@include('layouts.footer')

<script defer>
    document.getElementById('tafel').innerHTML = 'Tafel: ' + sessionStorage.getItem('tafel');
</script>
</body>
</html>