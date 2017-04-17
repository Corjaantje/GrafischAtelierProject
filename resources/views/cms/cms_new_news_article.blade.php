<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@if (Auth::check() && Auth::user()->role == "admin")
@include('layouts.cms_navigation', array('currentPage'=>'Nieuws'))
<div class="container">
    <form action="newNewsArticle" method="post" enctype="multipart/form-data">


        <input type="hidden" name="_token" value=" {{ csrf_token() }} " >

        <input type="hidden" name="ID" value="-1" />
        <br> <br>
        Titel: <br>
        <input type="text" name="Title" value=" "> <br> <br>
        Image:
        <input type="file" accept=".jpeg, .jpg, .png" name="Image" value=""> <br>
        Description: <br>
        <textarea rows="5" cols="60" name="Description"></textarea> <br>
        Text: <br>
        <textarea rows="5" cols="60" name="Text"></textarea>  <br>
        Date:
        <input type="date" name="Date" value="<?php echo date('Y-m-d'); ?>" /> <br>
        Visible: <br>


        <input type="checkbox" name="Visible" value="1" checked> <br>
        <br>
        <input type="submit" value="Aanmaken"/>
    </form>
</div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>