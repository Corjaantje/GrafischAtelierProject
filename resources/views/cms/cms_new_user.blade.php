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
@include('layouts.cms_navigation', array('currentPage'=>'cmsUsers'))

<div class="container-cms">
    <br>
    <h2><b>Nieuwe gebruiker</b></h2>
    <br>
    {{ Form::open(['route' => 'create_user']) }}
    {{ Form::hidden('_token', csrf_token()) }}
    Naam: {{ Form::text('Name','',array('required' => 'required')) }} <br><br>
    Email: <input type="email" name="email" required /> <br><br>
    Accountnaam: {{ Form::text('AccountName','',array('required' => 'required')) }} <br><br>
    Wachtwoord: <input type="password" name="password" required /> <br><br>
    Adres: {{ Form::text('Address','',array('required' => 'required')) }} <br><br>
    <input class="btn btn-primary" type="submit" value="Opslaan">
    {{ Form::close() }}
</div>

</body>
</html>