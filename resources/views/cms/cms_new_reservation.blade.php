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
@include('layouts.cms_navigation', array('currentPage'=>'Reserveringen'))
@php
    $userArray = App\Http\Controllers\ReservationController::getAllUsers();
    $courseArray = App\Http\Controllers\ReservationController::getAllCourses();
@endphp
<div class="container-cms">
    <br><br><br>
    <h2><b>Nieuwe
            reservering</b> @include('layouts.tooltip', array('text'=>'Hier kun je handmatig gebruikers toevoegen aan een cursus. Je kunt hiermee het maximaal aantal deelnemers overschrijven.'))
    </h2>
    <br>
    {{ Form::open(['route' => 'create_reservation', 'onsubmit' => 'return confirm("Het kan zijn dat u het maximum aantal aanmeldingen gaat overschrijven. Weet u zeker dat u door wilt gaan?")']) }}
    {{ Form::hidden('_token', csrf_token()) }}
    User: <select name="cbUsers">
        @foreach($userArray as $user)
            <option name="{{ $user->id }}" value="{{ $user->id }}">{{ $user->first_name }}</option>
        @endforeach
    </select><br/><br/>
    Cursus: <select name="cbCursus">
        @foreach($courseArray as $course)
            <option name="{{ $course->id }}" value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select><br/><br/>
    @if (count($userArray) > 0 && count($courseArray) > 0)
        <input class="btn btn-primary" type="submit" value="Opslaan">
    @endif
    {{ Form::close() }}
    <br>
</div>
</body>
</html>