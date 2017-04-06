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
@include('layouts.cmsHeader', array('currentPage'=>'Home'))
<div class="container">
    Titel: <input type="text" name="title"> <br>
    Image: <input type="file" accept=".jpeg, .jpg, .png" name="image"> <br>
    Description: <input type="text" name="description"> <br>
    Text: <input type="text" name="text"> <br>
    Visible: <input type="checkbox" name="visible"> <br>
    <button type="button" formmethod="post">Voeg artikel toe</button>
</div>

</body>
</html>