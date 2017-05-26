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
@include('layouts.cms_navigation', array('currentPage'=>'Nieuwsfilters'))
<div class="container-cms">

    <br><br><br>
    <h2><b>Nieuwsfilter bewerken</b> @include('tooltip', array('text'=>'Hier kun je bestaande nieuwsfilters wijzigen.')) </h2>
{{ Form::open(['route' => 'cms_newsfilters_edit_save']) }}
{{ Form::hidden('id', $matchingFilter->id) }}
<!-- hidden "_token" is necessary for laravel, will throw tokenmismatch exception if not included -->
    {{ Form::hidden('_token', csrf_token()) }}
    Naam: {{ Form::text('name', $matchingFilter->name, array('required' => 'required')) }} <br><br>

    <input class="btn btn-primary" type="submit" value="Wijzigen">

    {{ Form::close() }}

</div>

</body>
</html>