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
<input type="button" class="btn btn-primary" onclick="window.location='/'" value="Terug">

<img src="{{URL::to('/')}}/img/werkplaats ga.png" alt="" usemap="#Map" />
<map name="Map" id="Map">
    <area alt="" title="" href="#" shape="rect" coords="11,100,52,154" />
    <area alt="" title="" href="#" shape="rect" coords="13,188,61,248" />
    <area alt="" title="" href="#" shape="rect" coords="13,276,61,336" />
    <area alt="" title="" href="#" shape="rect" coords="13,368,60,428" />
    <area alt="" title="" href="#" shape="rect" coords="111,428,194,492" />
    <area alt="" title="" href="#" shape="rect" coords="688,86,747,149" />
    <area alt="" title="" href="#" shape="rect" coords="671,250,761,314" />
    <area alt="" title="" href="#" shape="rect" coords="638,366,793,465" />
</map>

@include('layouts.footer')
</body>
</html>