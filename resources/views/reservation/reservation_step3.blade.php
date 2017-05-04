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
<input type="button" class="btn btn-primary" onclick="window.location='{{ route('reservationStep1') }}'" value="Terug">
@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
<div class="container">
    <h1>Selecteer een tafel</h1>
    <p>Per techniek zijn een aantal tafels aanwezig. Selecteer aub een tafel die past bij de techniek die u wilt hanteren.</p>

        <img src="{{URL::to('/')}}/img/werkplaats ga.png" alt="" usemap="#Map" />
        <map name="Map" id="Map">
            <area alt="5" title="Zeefdruk - tafel 5 (klein)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="11,100,52,154" /> <!-- 5, 1 -->
            <area alt="4" title="Zeefdruk - tafel 4 (middelgroot)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="13,188,61,248" /> <!-- 4, 1 -->
            <area alt="3" title="Zeefdruk - tafel 3 (middelgroot)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="13,276,61,336" /> <!-- 3, 1 -->
            <area alt="2" title="Zeefdruk - tafel 2 (middelgroot)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="13,368,60,428" /> <!-- 2, 1 -->
            <area alt="1" title="Zeefdruk - tafel 1 (groot)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="111,428,194,492" /> <!-- 1,1 -->
            <area alt="6" title="Lithografie - tafel 1 (middelgroot)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="688,86,747,149" /> <!--6, 2 -->
            <area alt="7" title="Hoog- en Diepdruk - tafel 1 (groot)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="671,250,761,314" /> <!--7, 3 -->
            <area alt="8" title="Hoog- en Diepdruk - tafel 2 (extra groot)" href="{{URL::route('reservationStep3')}}" shape="rect" coords="638,366,793,465" /> <!--8, 3 -->
        </map>
</div>


<!-- TODO : in .js plakken en dan nog steeds zorgen dat het werkt-->

<script>
    $("area").click(function()
    {
        sessionStorage.setItem('tafel', this.title);
        sessionStorage.setItem('tafel_id', this.alt);
        window.location = '/reservation_step4';
    });
</script>

@include('layouts.footer')
</body>
</html>