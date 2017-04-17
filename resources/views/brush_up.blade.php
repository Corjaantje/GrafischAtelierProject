<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'brush_up'))

<div class="container bigText">
    <h1 class="title">Opfrissen & kennismaking</h1>
    <div class="row"><br />
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <p>
                Ben je bekend met grafiek, maar niet met onze werkplaats? Of is het al lang geleden dat je bij ons gewerkt hebt? Neem dan contact met ons op en volg een <b>gratis rondleiding</b>.<br /><br />

                Heb je het idee dat je kennis van de techniek weer even opgefrist moet worden dan bieden wij de volgende mogelijkheid:
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <p>
                <b>Kosten:</b> 50 euro voor vier uur werken in de werkplaats en persoonlijke begeleiding. Exclusief materiaalkosten en werkplaatshuur.<br /><br />

                <b>Voor een bijspijkerdagdeel moet vooraf een afspraak gemaakt worden, in verband met de begeleiding.</b><br /><br />

                Maak voor deze een van deze introducties een afspraak: info@gadenbosch.nl of 073-6134277<br /><br />

                Voor meer opties in begeleiding, het prepareren van zeven en drukwerk in opdracht zie Service & diensten.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Basis</h1>
            <p>
                In deze workshop leer je de basisbeginselen van een grafische techniek. Je werkt met professionele materialen. Het avontuur zit hem in het creatieve proces dat je aangaat en dat je uitdrukking geeft aan een eigen idee. Je bent vooral aan het doen i.p.v. denken en gaat mét prent naar huis. Alle workshops worden gegeven door professionele kunstenaars met ruime ervaring in lesgeven aan groepen.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Kennis opfrissen</h1>
            <p>
                <b>Inhoud:</b> Een dagdeel (4 uur) waarin je onder begeleiding van een van onze ervaren drukkers met je eigen ontwerp aan de slag gaat. Na dit bijspijkerdagdeel kan je weer volledig zelfstandig aan de slag bij het GA.
            </p>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>