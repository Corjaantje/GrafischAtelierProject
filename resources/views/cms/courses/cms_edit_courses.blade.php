@php
	use App\Http\Controllers\CoursesController;

	if(isset($_POST['id'])){

		$course = App\Course::find($_POST['id']);
		
		$controller = new CoursesController();
		
		$visible = "";
		if($course->visible = 1){
			$visible = "checked";
		}
		
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
</head>
<body class="body-cms">
@if (Auth::check() && Auth::user()->role == "admin")

    @include('layouts.cms_navigation', array('currentPage'=>'Cursus Wijzigen'))
    <div class="container-cms">
        <!--CONTENT IN HERE-->
        <br>
        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_courses_list')}}'">Terug</button>
        <h2><b>Cursus Bewerken</b></h2>

        {{ Form::open(array('url' => 'cms/cursus/editAction')) }}
	        	{{ Form::hidden('_token', csrf_token()) }}
	        	{{ Form::hidden('id', $_POST['id']) }}
	        	
	        	Naam: {{ Form::text('name', $course->name) }}<br>
	        	Beschrijving: <br>
	        	{{ Form::textarea('description', $course->description) }}<br>
	        	Cursusgever: {{ Form::text('coursegiver_name', $course->coursegiver_name) }}<br>
	        	
	        	Maximaal aantal deelnemers(0 deelnemers betekend geen limiet)<br>
	        	<input type="number" name="max_signups" min="0" value="{{ $course->max_signups}}"/><br>
	        	
	        	Prijs: €<input type="number" name="price" min="0" value="{{ $course->price}}"/><br>
	        	
	        	starttijd: <input type="datetime-local" name="datetime_start" id="startTime" value="{{ $controller->prepareDatetime($course->datetime_start) }}"/><br>
	        	eindtijd: <input type="datetime-local" name="datetime_end" id="endTime" value="{{ $controller->prepareDatetime($course->datetime_end) }}"/><br>
	        	
	        	<input type="checkbox" name="visible" {{$visible}} /> zichtbaar<br>
	        	<input type="submit" class="btn btn-primary"/>
	        {{ Form::close() }}
        <br>
        <script type="text/javascript">
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1;
			var yyyy = today.getFullYear();
			 if(dd<10){
			        dd='0'+dd
			    } 
			    if(mm<10){
			        mm='0'+mm
			    }
			today = yyyy+'-'+mm+'-'+dd+"T00:00";
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