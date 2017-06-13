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
@include('layouts.cms_navigation', array('currentPage'=>'Gebruikers'))

<div class="container-cms">
    <br><br><br>
    <h2><b>Nieuwe gebruiker</b> @include('tooltip', array('text'=>'Hier kun je handmatig een nieuwe gebruiker toevoegen aan het systeem. Deze gebruiker kan vervolgens zelf inloggen.')) </h2>
    <br>
    {{ Form::open(['route' => 'cms_users_add_save']) }}
    {{ Form::hidden('_token', csrf_token()) }}
    Voornaam: {{ Form::text('first_name','',array('required' => 'required')) }} <br><br>
    Achternaam: {{ Form::text('last_name','',array('required' => 'required')) }} <br><br>
    Email: <input type="email" name="email" pattern="\w+@\w+\.\w+" required /> <br><br>
    Gebruikersnaam: {{ Form::text('username','',array('required' => 'required')) }} <br><br>
    Wachtwoord: <input type="password" name="password" required /> <br><br>
    Adres: {{ Form::text('address','',array('required' => 'required')) }} <br><br>
    Beheerder: {{ Form::checkbox('role') }}
    <input class="btn btn-primary" type="submit" value="Opslaan">
    {{ Form::close() }}
</div>

</body>
</html>