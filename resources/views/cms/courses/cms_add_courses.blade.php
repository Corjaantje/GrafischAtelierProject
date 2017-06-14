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
@include('layouts.cms_navigation', array('currentPage'=>'Cursussen'))
<div class="container-cms">
    <br><br>
    <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_courses_list')}}'">
        Terug
    </button>
    <br><br>
    <h2><b>Cursus
            toevoegen</b> @include('layouts.tooltip', array('text'=>'Hier kun je een nieuwe cursus aanmaken. Als je oneindig veel deelnemers wil, vul dan in het veld 0 in.'))
    </h2>
    <br>
    {{ Form::open(['route' => 'cms_courses_add_confirmation']) }}

    Cursus naam: {{ Form::text('course_name','',array('required' => 'required'))}} <br><br>
    Docent naam: {{ Form::text('coursegiver_name','',array('required' => 'required')) }} <br><br>
    Prijs: € <input type="number" name="price" min="0" value="0"/> <br><br>
    (0 deelnemers betekent dat er geen limiet wordt gezet)<br>
    Maximum deelnemers: <input type="number" name="max_people" min="0" value="0" step="any"/> <br><br>
    Datum: <input type="date" name="date" id="date" required> <br><br>
    Starttijd: <input type="time" name="start_time" required> <br><br>
    Eindtijd: <input type="time" name="end_time" required> <br><br>

    Beschrijving: <br>
    {{ Form::textarea('description','',array('required' => 'required'))}} <br>
    Openbaar {{ Form::checkbox('visible', 1, 1) }} <br><br>

    <input class="btn btn-primary" onclick="validate()" type="submit" value="Opslaan">
    {{ Form::close()}}
</div>
<script type="text/javascript">
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);
</script>
</body>
</html>