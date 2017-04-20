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

    @include('layouts.cms_navigation', array('currentPage'=>'Cursus Toevoegen'))
    <div class="container-cms">
        <!--CONTENT IN HERE-->
        <br>
        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_courses_list')}}'">
            Terug
        </button>

        <h2><b>Nieuwe cursus</b></h2>
        <br>
        {{ Form::open(['route' => 'cms_courses_add_confirmation']) }}

        Cursus naam: {{ Form::text('course_name') }} <br><br>
        Docent naam: {{ Form::text('coursegiver_name') }} <br><br>
        Prijs: € <input type="number" name="price" min="0" value="0"/> <br><br>
        Maximum deelnemers: <input type="number" name="max_people" min="0", value="0"/> <br><br>
        Datum: {{ Form::date('date', \Carbon\Carbon::now()) }} <br><br>
        Starttijd: {{Form::selectRange('start_hours', 00, 23, 12)}} :  {{Form::selectRange('start_minutes', 00, 59)}} <br><br>
        Eindtijd: {{Form::selectRange('end_hours', 00, 23, 13)}} :  {{Form::selectRange('end_minutes', 00, 59)}} <br><br>

        Beschrijving: <br>
        {{ Form::textarea('description')}} <br>
        Openbaar {{ Form::checkbox('visible', 1, 1) }} <br><br>

        <input class="btn btn-primary" type="submit" value="Opslaan">

    {{ Form::close() }}
    <!---->
    </div>
@else
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
</body>
</html>