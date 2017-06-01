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
@if (Auth::check() && Auth::user()->role == "admin")

    @include('layouts.cms_navigation', array('currentPage'=>'Nieuwsfilters'))
    <div class="container-cms">

        <br><br><br>
        <h2><b>Nieuwsfilter aanmaken</b> @include('tooltip', array('text'=>'Hier kun je nieuwe nieuwsfilters aanmaken.')) </h2>
        {{ Form::open(['route' => 'cms_newsfilters_add_save']) }}

        Naam: {{ Form::text('name','', array('required' => 'required')) }} <br><br>

        <input class="btn btn-primary" type="submit" value="Opslaan">

        {{ Form::close() }}

    </div>
@else
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
</body>
</html>