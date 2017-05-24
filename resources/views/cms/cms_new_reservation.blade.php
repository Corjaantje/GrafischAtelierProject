<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="html-cms">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body class="body-cms">
@include('layouts.cms_navigation', array('currentPage'=>'cmsReservation'))
@php
$userArray = App\Http\Controllers\ReservationController::getAllUsers();
$courseArray = App\Http\Controllers\ReservationController::getAllCourses();
@endphp
<div class="container-cms">
    <br><br>
    <h2><b>Nieuwe reservering</b> @include('tooltip', array('text'=>'Tooltip tekst voor cms reserveringen')) </h2>
    <br>
    {{ Form::open(['route' => 'create_reservation']) }}
    {{ Form::hidden('_token', csrf_token()) }}
    User: <select name="cbUsers">
        @foreach($userArray as $user)
            <option name="{{ $user->id }}" value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select><br /><br />
    Cursus: <select name="cbCursus">
        @foreach($courseArray as $course)
            <option name="{{ $course->id }}" value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select><br /><br />
    <input class="btn btn-primary" type="submit" value="Opslaan">
    {{ Form::close() }}
    <br>
</div>
</body>
</html>