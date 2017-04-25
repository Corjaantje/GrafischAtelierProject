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
@if (Auth::check() && Auth::user()->role == "admin")

    @include('layouts.cms_navigation', array('currentPage'=>'Cursus Toevoegen - Bevestiging'))
    <div class="container-cms">
        <!--CONTENT IN HERE-->
        <br>
        <button class="btn btn-primary" onclick="goBack()">Terug</button>
        <h2><b>Cursus Bevestiging</b></h2><br>
        @php
            echo $request->course_name."<br>";
            echo $request->date." van ".$request->start_time." - ".$request->end_time."<br>";
            echo "Gegeven door ".$request->coursegiver_name."<br>";
            if($request->max_people == 0)
            {
                echo "Limiet is onbeperkt"."<br><br>";
            }
            else
            {
                echo "Limiet is ".$request->max_people." personen"."<br><br>";
            }
            echo nl2br($request->description)."<br><br>";
        @endphp
    {{ Form::open(['route' => 'cms_courses_add_confirmed']) }}
        {{Form::hidden('course_name', $request->course_name)}}
        {{Form::hidden('coursegiver_name', $request->coursegiver_name)}}
        {{Form::hidden('price', $request->price)}}
        {{Form::hidden('max_people', $request->max_people)}}
        {{Form::hidden('date', $request->date)}}
        {{Form::hidden('start_time', $request->start_time)}}
        {{Form::hidden('end_time', $request->end_time)}}
        {{Form::hidden('description', $request->description)}}
        {{Form::hidden('visible', $request->visible)}}
        <input class="btn btn-primary" type="submit" value="Bevestigen">
    {{ Form::close()}}
    <!---->
    </div>
@else
    <script>window.location.href = "{{ route('login') }}"</script>
@endif

<script>
    function goBack() {
        window.history.back();
    }

</script>
</body>
</html>