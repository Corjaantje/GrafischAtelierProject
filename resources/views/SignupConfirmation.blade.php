@php
$course = App\Course::find($id)
@endphp
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
<script src="{{ URL::asset('js/app.js') }}"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Archief'));

<h2>{{$course->name}}</h2>
<h3>&euro;{{number_format($course->price, 2)}}</h3>
<br>
{{$course->description}}
<br>
{{$course->datestime_start}} - {{$course->datetime_end}}

<br>
<strong>Weet u zeker dat u zich voor deze cursus wilt inschrijven?</strong>
<br>
{{Form::open(array('url' => 'cursus_bevestigd')}}

{{Form::hidden('id' , $id)}}
<input type="submit" class="btn btn-primary" value="ja"/>
{{Form::close()}}
<button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('agenda')}}'">nee</button>

@include('layouts.footer')
</body>

</html>