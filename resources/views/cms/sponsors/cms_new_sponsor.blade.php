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
@include('layouts.cms_navigation', array('currentPage'=>'Sponsors'))
<div class="container-cms">
    <br><br><br>
    <h2><b>Nieuwe sponsor</b> @include('layouts.tooltip', array('text'=>'Hier kun je een nieuwe sponsor toevoegen, die in de footer zal komen. Let erop dat de URL moet beginnen met "http://".')) </h2>
    <br>
    <form action="{{ route('create_sponsor') }}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        Naam: <input type="text" name="Name" required /><br><br>
        Sponsor URL: <input type="url" name="URL" required  /><br><br>
        Afbeelding: <input type="file" name="Image" accept="image/*" required /><br><br>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
</body>
</html>