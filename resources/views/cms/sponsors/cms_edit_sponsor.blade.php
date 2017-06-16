<!DOCTYPE html>
<html class="html-cms">
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
    <div  class="container-cms">
        <br><br><br>
        <h2><b>Sponsor bewerken</b> @include('layouts.tooltip', array('text'=>'Hier kun je een bestaande sponsor bewerken. Let erop dat de URL nog steeds moet beginnen met "http://".')) </h2>
        <form action="{{ route('edit_sponsor') }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $matchingSponsor->id}}" />
            Naam: <input type="text" name="Name" value="{{ $matchingSponsor->name }}" required /><br><br>
            Sponsor URL: <input type="url" name="URL" value="{{ $matchingSponsor->sponsor_url }}" required  /><br><br>
            Afbeelding: <input type="file" name="Image" accept="image/*" value="{{ $matchingSponsor->image }}" required /><br><br>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>