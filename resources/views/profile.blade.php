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
		<div class="profilePicture col-md-3">
			<!--Default image, not (yet?) dynamic-->
			<img src="{{ URL::asset('img/defaultProfile.png') }}" alt="Profile" height="150px" width="150px">
		</div>
		<div class="userInfo col-md-6">
			@php
				echo "<h3>".$userinfo['username']."</h3>";
				echo $userinfo['role']."<br><br>";
				echo $userinfo['address']."<br>";
				echo $userinfo['mail'];
			@endphp
		</div>
	</div>
	<div class="row">
		<div class="userReservedTables col-md-6">
			<h3>Gereserveerde Tafels</h3>
			@php
				//Show all reserved tables with the end date in the future from the current date.
					foreach ($reservedTables as $table)
					{
						$dateStart = new DateTime($table->start_date);
						$dateEnd = new DateTime($table->end_date);

			@endphp

			<div>
				<div style="margin-top:20px;"><span><b>{{$dateStart->format("d-m-Y")}}</b> {{$dateStart->format("H:i")}}-{{$dateEnd->format("H:i")}} ( {{\App\Technique::getTechniqueByTableID($table->table_id)}}
						)</span>
					{{Form::open(['method' => 'delete', 'route' => 'alter_reservation', 'style'=>'float:right;'])}}
					<input type="hidden" name="id" value="{{$table->id}}">
					<input type="submit" class="btn btn-primary" name="submit" value="Opzeggen">
					{{Form::close()}}
					{{Form::open(['method' => 'post', 'route' => 'edit_reservation', 'style'=>'float:right;'])}}
					<input type="hidden" name="id" value="{{$table->id}}">
					<input type="submit" class="btn btn-primary" name="submit" value="Wijzigen">
					{{Form::close()}}

				</div>
			</div>
			@php
				}
			@endphp
		</div>
		<div class="userReservedCourses col-md-6">
			<h3>Ingeschreven Cursussen</h3>
			@php
				//Show all signed up courses with the end date in the future from the current date.
				foreach ($signedupCourses as $course)
				{
			@endphp
			{{$course->name}}<br>
			{{Form::open(['method' => 'delete', 'route' => 'alter_reservation'])}}
			<input type="hidden" name="id" value="{{$course->id}}">
			<input type="submit" class="btn btn-primary" name="submit" value="Uitschrijven">
			{{Form::close()}}
			@php
				}
			@endphp

		</div>
	</div>
	<div class="row">
		{{Form::open(['route' => 'abonnement_wijzigen'])}}
		@php

			// zou een laad icoon kunnen gebruiken voor gebruiksvriendelijkheid
			if ($subscriptionStatus == 'subscribed')
			{
			echo  '<input type="submit" class="btn btn-primary" name="wijzigen" value="Opzeggen">';
			}
			else
			{
			 echo  '<input type="submit" class="btn btn-primary" name="wijzigen" value="Abonneren">';
			}

		@endphp
		{{Form::close()}}
		@php
			if ($subscriptionText != null)
				   echo '<p>' .$subscriptionText. '</p>';

		@endphp

	</div>

	<div class="row">
		<a href="{{ route('edit_profile') }}" type="button" class="btn btn-primary">Gegevens wijzigen</a>
		<a href="{{ route('change_password') }}" type="button" class="btn btn-primary">Wachtwoord wijzigen</a>
	</div>

</div>

@php
	/*
	User Information --DONE--
		-Username
		-Email
		-Address

	Configuration --WIP--
		-Edit Password
		-Edit Username
		-Edit Adress
		-Edit Email

	Reservations Div --DONE--
		-Courses Reserved
		-Tables Reserved
	*/
@endphp
@include('layouts.footer')
</body>
</html>

