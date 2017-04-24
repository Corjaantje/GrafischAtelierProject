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
@if (Auth::check() && Auth::user()->role == "admin")

    @include('layouts.cms_navigation', array('currentPage'=>'Cursus Toevoegen'))
    <div class="container-cms">
        <!--CONTENT IN HERE-->
        <br>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{URL::route('cms_courses_list')}}'">Terug</button>
        <!---->
    </div>
@else
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
</body>
</html>