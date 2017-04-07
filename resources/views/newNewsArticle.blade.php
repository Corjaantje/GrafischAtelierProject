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
@include('layouts.cmsHeader', array('currentPage'=>'Nieuws'))
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
        <input type="date" name="Date" value="" /> <br>
        Visible: <br>
        <input type="number" name="Visible" value=""> <br>
        <br>
        <input type="submit" value="Aanmaken"/>
    </form>
</div>

</body>
</html>