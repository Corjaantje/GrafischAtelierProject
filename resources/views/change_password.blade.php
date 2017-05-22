<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
<script src="{{ URL::asset('js/app.js') }}"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Profiel - '.Auth::user()->username))

<h1>Wachtwoord wijzigen</h1>

@isset($error)
	<h2>{{$error}}</h2>
@endisset

{{Form::open(['route' => 'change_password_action'])}}

Huidig wachtwoord:<br>
{{Form::password('current_password', array('required' => 'required'))}}<br>

Nieuw wachtwoord:<br>
{{Form::password('new_password', array('required' => 'required'))}}<br>

Bevestig nieuw wachtwoord:<br>
{{Form::password('confirmation_password', array('required' => 'required'))}}<br>

<input type="submit" value="Opslaan" class="btn btn-primary"/>

{{Form::close()}}

@include('layouts.footer')
</body>
</html>