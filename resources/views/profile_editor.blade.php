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
<div class="profile">
	<div class="row">
		
		<h1>Persoonsgegevens aanpassen</h1>

		@if(isset($error))
			<h2>{{$error}}</h2>
		@endif
		
		{{ Form::open(['route' => 'edit_profile_action']) }}
		
			Gebruikersnaam:<br>
				<input type="text" value="{{ $userinfo['username'] }}" name="username" required/><br>
		
			E-mail:<br>
				<input type="email" value="{{ $userinfo['mail'] }}" name="mail" required/><br>
			
			Adres:<br>
				<input type="text" value="{{ $userinfo['address'] }}" name="address" required/><br>
				
			Huidig wachtwoord:<br>
				<input type="password" name="password" required/><br>
				
			Nieuwsbrief:
				<input type="checkbox" name="newsletter" value="true"/><br>
			
			<input class="btn btn-primary"  type="submit" value="Opslaan">
		
		{{ Form::close() }}

	</div>
</div>

@include('layouts.footer')
</body>
</html>

