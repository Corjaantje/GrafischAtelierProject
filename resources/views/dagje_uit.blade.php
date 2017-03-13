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
@include('layouts.header', array('title'=>'Dagje uit'))
<div class="container bigText">
    <h1 class="title">Dagje uit</h1>
    <div class="row"><br />
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Grafiek als avontuur</h1>
            <p>
                Maak kennis met eeuwenoude en toch zeer moderne grafische technieken. Bijvoorbeeld een vriend(inn)en club, reünie, vrijgezellendag, familie, voetbalteam etc. Daarnaast kunnen bedrijven bij ons terecht voor een bedrijfsuitje, training of teambuilding.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Op maat</h1>
            <p>
                Workshops kunnen op maat worden gemaakt.<br /><br />

                We hebben bijvoorbeeld voor werknemers van het Noordbrabants Museum een stoomcursus grafische technieken gemaakt en voor de personeelsvereniging van de gemeente ’s-Hertogenbosch hebben we een roulerende workshop gemaakt waarbij drie grafische technieken met elkaar werden gecombineerd.<br /><br />

                De gehele werkplaats biedt ruimte voor maximaal 45 personen. Vraag vrijblijvend een offerte aan.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Basis</h1>
            <p>
                In deze workshop leer je de basisbeginselen van een grafische techniek. Je werkt met professionele materialen. Het avontuur zit hem in het creatieve proces dat je aangaat en dat je uitdrukking geeft aan een eigen idee. Je bent vooral aan het doen i.p.v. denken en gaat mét prent naar huis. Alle workshops worden gegeven door professionele kunstenaars met ruime ervaring in lesgeven aan groepen.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Plus arrangementen</h1>
            <p>
                Deze arrangementen zijn extra bij een workshop te boeken.<br /><br />

                + Inspiratie rondleiding<br />
                Het is mogelijk een rondleiding te krijgen in de Willem II Fabriek waarbij een aantal ateliers van grafische kunstenaars worden bezocht.<br />
                Duur: 30min.<br />
                Kosten: €10 p.p. (incl. btw)<br /><br />

                + Lunch (vanaf oktober 2015)<br />
                Heerlijke lunchhapjes in ontvangstgelegenheid Hangop in de Willem II Fabriek<br />
                Duur: 30min<br />
                Kosten: €10 p.p. (incl. btw)<br />
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Aanbod</h1>
            <p>
                • Zeefdruk: Bedruk je eigen tas of t-shirt; Experimenteren met kleur; Ruimer denken<br />
                • Materiaaldruk: Groene vingers; Onkruid vergaat niet<br />
                • Droge naald: In het voetspoor van Rembrandt; Van twijfelen naar handelen<br />
                • Lithografie: Drukken met Cola<br />
                • Linografie: Het hoofd leeg; Alle neuzen dezelfde kant op<br /><br />
                Duur: 2,5 uur. Kosten: Vanaf €40,00 p.p. bij 15 deelnemers (incl. btw).
                Neem contact op met educatie@gadenbosch.nl voor een offerte.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <p>
                <img src="http://www.gadenbosch.nl/fotoseducatie/2_bedrijfsuitjes3.jpg"><br /><br />
                <img src="http://www.gadenbosch.nl/fotoseducatie/2_NBrabantsMuseum.jpg">
            </p>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>