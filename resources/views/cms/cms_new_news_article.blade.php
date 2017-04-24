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
@if (Auth::check() && Auth::user()->role == "admin")
@include('layouts.cms_navigation', array('currentPage'=>'Nieuws'))
<div class="container-cms">
    <form action="nieuw_artikel" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value=" {{ csrf_token() }} " >
        <input type="hidden" name="id" value="-1" />
        <br> <br>
        Titel: <br>
        <input type="text" name="title" value=" "> <br> <br>
        Afbeelding:
        <input type="file" accept=".jpeg, .jpg, .png" name="image" value=""> <br>
        Omschrijving: <br>
        <textarea rows="5" cols="60" name="description"></textarea> <br>
        Tekst: <br>
        <textarea rows="5" cols="60" name="text"></textarea>  <br>
        Datum:
        <input type="date" name="date" value="@php echo date('Y-m-d'); @endphp" /> <br>
        Zichtbaar?: <br>


        <input type="checkbox" name="visible" value="1" checked> <br>
        <br>
        <input class="btn btn-primary" type="submit" value="Aanmaken"/>
    </form>
</div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>