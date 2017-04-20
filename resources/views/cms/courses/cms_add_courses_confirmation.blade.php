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
        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_courses_add')}}'">
            Terug
        </button>
        <h2><b>Cursus Bevestiging</b></h2><br>

        Cursus naam: <b>@php echo $request->course_name @endphp</b><br><br>
        Docent naam: <b>@php echo $request->coursegiver_name @endphp</b><br><br>
        Prijs: <b>€ @php echo $request->price @endphp</b>  <br><br>
        Maximum deelnemers: <b>@php echo $request->max_people @endphp</b><br><br>
        Datum: <b>@php echo $request->date @endphp</b>  <br><br>
        Starttijd: <b>@php echo $request->start_hours." : ".$request->start_minutes @endphp</b><br><br>
        Eindtijd: <b>@php echo $request->end_hours." : ".$request->end_minutes @endphp</b><br><br>

        Beschrijving:<br><b>@php echo $request->description @endphp</b>  <br><br>
        Openbaar: <b>@php if($request->visible == 1){ echo "Ja";}else{echo "Nee";} @endphp</b><br><br>

        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_courses_add')}}'">
            Bevestigen
        </button>
        <!---->
    </div>
@else
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
</body>
</html>