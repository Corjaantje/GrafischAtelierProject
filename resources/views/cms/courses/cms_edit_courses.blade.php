@php
    use App\Http\Controllers\CoursesController;

    if(isset($_POST['id'])){

        $course = App\Course::find($_POST['id']);

        $controller = new CoursesController();

        $signupsIsNotNull = ($course->max_signups != null);
    }
    else {
        echo "<script>window.location.href = \"{{ route('cms_courses_list') }}\"</script>";
    }
@endphp
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
@if (Auth::check() && Auth::user()->role == "admin")

    @include('layouts.cms_navigation', array('currentPage'=>'Cursussen'))
    <div class="container-cms">
        <!--CONTENT IN HERE-->
        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_courses_list')}}'">
            Terug
        </button>
        <br><br><br>
        <h2><b>Cursus bewerken</b> @include('tooltip', array('text'=>'Hier kun je de gegevens van een cursus wijzigen.')) </h2>

        {{ Form::open(array('url' => 'cms/cursus/bewerkenActie')) }}
        {{ Form::hidden('id', $_POST['id']) }}

        Cursus naam: {{ Form::text('name', $course->name, array('required' => 'required')) }}<br><br>

        Docent naam: {{ Form::text('coursegiver_name', $course->coursegiver_name, array('required' => 'required')) }}<br><br>

        Prijs: €<input type="number" name="price" min="0" value="{{ $course->price}}" step="any" required/><br><br>
        (0 deelnemers betekent dat er geen limiet wordt gezet)<br>
        Maximum deelnemers
        <input type="number" name="max_signups" min="0" value="{{ $course->max_signups}}" step="1" required/><br><br>

        Starttijd: <input type="datetime-local" name="start_date" id="startTime"
                          value="{{ $controller->prepareDatetime($course->start_date) }}" required/><br><br>
        Eindtijd: <input type="datetime-local" name="end_date" id="endTime"
                         value="{{ $controller->prepareDatetime($course->end_date) }}" required/><br><br>

        Beschrijving: <br>
        {{ Form::textarea('description', $course->description, array('required' => 'required')) }}<br>

        @php
            if($course->visible == 1)
            {
                  echo 'Openbaar <input type="checkbox" checked="true" name="visible"/> <br><br>';
            }
            else
            {
                  echo 'Openbaar <input type="checkbox" name="visible"/> <br><br>';
            }
        @endphp
        <input type="submit" value="Opslaan" class="btn btn-primary"/>
        {{ Form::close() }}
        <br>
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
            today = yyyy + '-' + mm + '-' + dd + "T00:00";
            document.getElementById("startTime").setAttribute("min", today);
            document.getElementById("endTime").setAttribute("min", today);
        </script>
        <!---->
    </div>
@else
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
</body>
</html>