@php
    use App\Http\Controllers\ProductController;
    $controller = new ProductController();

    $formData = $controller->getFormData();

@endphp
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
@include('layouts.cms_navigation', array('currentPage'=>'cmsProduct'))

<div class="container-cms">
<br>
    <h2><b>Nieuw Product<b></b></h2>
    <br>
{{ Form::open(['route' => 'create_product']) }}

<!-- hidden "_token" is necessary for laravel, will throw tokenmismatch exception if not included -->
    {{ Form::hidden('_token', csrf_token()) }}

    Naam: {{ Form::text('Name') }} <br><br>
    Prijs: <input type="number" name="Price" min="0"/> <br><br>
    Beschrijving <br><br>
    {{ Form::textarea('Description')}} <br>

    <input class="btn btn-primary" type="submit" value="Opslaan">

    {{ Form::close() }}

</div>

</body>
</html>