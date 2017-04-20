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
@include('layouts.header', array('title'=>'Home'))
<div class="container">
    <h1 class="title reservationTitles">Wilt u een workshop of een cursus reserveren?</h1>
    <div class="row"><br />
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <img src="../../../public/img/Reservation/workshop.png" class="reservationImages">
            <input type="hidden" value="Workshop">
            <input type="submit" name="workshop" class="btn btn-primary reservationButtons" value="Naar volgende stap">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <img src="../../../public/img/Reservation/cursus.png" class="reservationImages">
            <input type="hidden" value="Cursus">
            <input type="submit" name="cursus" class="btn btn-primary reservationButtons" value="Naar volgende stap">
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>