<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Home'))

<div class="container">

    <div class="title">
        <h1>Inschrijven voor de cursus "{{ $course->name }}"</h1>
        <p><b>{{ $course->description }}</b></p>
        <p>Door: <i>{{ $course->coursegiver_name }}</i></p>
        <p><i>{{\App\Courses_has_user::getSignedUp($course->id)}}/{{$course->max_signups}} ingeschreven</i></p>
    </div>
    <div class="row">
        {{Form::open(['route' => 'submitCourseReservation'])}}
        <input type="hidden" name="id" value="{{$course->id}}">
        <input type="submit" name="btnInsertReservation" value="Inschrijven" class="btn btn-primary">
        {{Form::close()}}
    </div>

</div>


@include('layouts.footer')
</body>