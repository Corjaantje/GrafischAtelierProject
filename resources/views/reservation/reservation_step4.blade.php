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
<input type="button" class="btn btn-primary" onclick="window.location='{{ route('reservationStep2') }}'" value="Terug">
@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
<div class="container">
    <h1 class="title reservationTitles">Voor wanneer wilt u reserveren?</h1>
    <div class="row"><br /><br />
        {{ Form::open(['route' => 'ReservationStep_3']) }}
    <p id="tafel"></p>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-4">
            <img src="{{URL::to('/')}}/img/Reservation/imgTemp1.jpg" class="reservationImages">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-4">
            <b>Datum:</b><br /><input type="date" name="date" value="@php echo date("Y-m-d"); @endphp"><br /><br />
            <b>Starttijd:</b><br /><input type="time" name="start_time" value="12:00" min="9:00" max="16:59" id="startTime" required><br /><br />
            <b>Eindtijd:</b><br /><input type="time" name="end_time" value="15:00" min="12:00" max="17:00" id="endTime" required><br /><br />
            <input type="hidden" name ="table_id" id="table_id" value="">
            <input type="submit" name="btnDateTime" value="Naar volgende stap" class="btn btn-primary">
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

<script defer>
    document.getElementById('tafel').innerHTML = 'U heeft ' + sessionStorage.getItem('tafel') + ' geselecteerd';
    document.getElementById('table_id').value = sessionStorage.getItem('tafel_id');

    $('#startTime').change(function() {
		$('#endTime').attr({"min" : $('#startTime').val()});
    });
</script>
</body>
</html>