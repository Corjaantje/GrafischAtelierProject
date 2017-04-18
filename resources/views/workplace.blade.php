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
@include('layouts.header', array('title'=>'workplace'))
<div class="jumbotron text-center">
    <h1>Werkplaats</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div>
                <h2><b>Welkom in de mooiste grafiekwerkplaats van Nederland!</b> </h2>
                <p>Het Grafisch Atelier biedt kunstenaars, vormgevers en creatieven een goed geoutilleerde werkplaats met deskundige ondersteuning en een omgeving om te experimenteren. In het GA wordt zoveel mogelijk gewerkt met non-toxic materialen.</p>
            </div>

            <div>
                <h3>Aan de slag</h3>
                <p>Reserveer van te voren een werkplek. Dit kan telefonisch, via de email of middels de agenda die in de werkplaats ligt. Kun je niet komen? Meld je dan af. Anders zijn wij genoodzaakt kosten in rekening te brengen voor de tijd dat je de werkplek hebt gereserveerd.</p>

                <h3>Voor het eerst aan de slag in het GA? </h3>
                <p>Je bent verplicht een introductie te volgen. Als je in het GA een cursus hebt gevolgd in de techniek waarin je aan de slag gaat, dan staat dit gelijk aan een introductie.</p>
            </div>

            <h2><b>Technieken</b></h2>
            <h3>Zeefdruk</h3>
            <p>Er zijn 5 zeefdruktafels met vacuümafzuiging: een zeefdruktafel voor maximaal A1 formaat, drie tafels voor A2 formaat  en een tafel voor A3 formaat. Verder hebben we een grote collectie zeeframen in allerlei formaten.</p>

            <h3>Hoogdruk en diepdruk</h3>
            <p>Op de etsafdeling zijn twee etspersen aanwezig, een van 100 x 200 cm en een van 100 x 60 cm.
                Alle noodzakelijke voorzieningen voor deze hoog- en diepdruk technieken zijn aanwezig:
                <ul>
                <li>Ets en droge naald</li>
                <li>Linosnede</li>
                <li>Toyobo</li>
                <li>Polymeer</li>
                <li>Materiaaldruk</li>
                <li>Houtdruk</li>
            </ul>
            Voor inbijten van zink- en koperplaten wordt gebruik gemaakt van kopersulfaat en ijzerchloride.
            </p>

            <h3>Steendruk</h3>
            <p>De lithopers van het GA is een handaangedreven mechanische pers, met een druktafel van 80 x 120 cm. Er zijn zo’n 50 lithostenen aanwezig, van diverse maten. </p>

            <h3>Cyanotype & gomdruk</h3>
            <p>Voor het maken van cyanotype en gomdruk hebben wij een mooie DOKA, belichter en diverse papieren.</p>

            <h3>Kopieermachine</h3>
            <p>Met de kopieermachine kunnen transparanten tot A3 formaat worden gemaak. Ook grotere formaten zijn in overleg mogelijk. Neem hiervoor contact op met het GA.</p>

            <h3>Te koop</h3>
            <p>Heb je materialen nodig? Dan kun je ook bij ons terecht. Wij hebben vele soorten materialen voor alle technieken te koop. Zie hiervoor onze <a href="fedha.nl/prijzen">prijslijst</a>.</p>
        </div>

        <div class="col-md-3">
            <h3>Openingstijden werkplaats</h3>
            <p>Maandag tot en met vrijdag: 09:00 - 17:00<br>Zaterdag vanaf 13:00</p>

            <h3>Beheerders</h3>

            <h4>Maandagochtend</h4>
            <p>Kristel van Genugten (tot 14.30 u), coördinator.<br>
                Maartje van der Kruijs, beheer zeefdrukwerkplaats.<br>
                Nico Thöne, medewerker educatie en workshops.
            </p>
            <h4>Maandagmiddag</h4>
            <p>
                Marie-Louise Wasiela, ets, zeefdruk.
            </p>
            <br>
            <h4>Dinsdag</h4>
            <p>
                Kristel van Genugten (tot 14.30 u), coördinator.<br>
                Peter Koene, algemeen werkplaatsbeheer.<br>
                Willemijn van Dorp, zeefdruk.</p>
            <br>
            <h4>Woensdagochtend</h4>
            <p>Roos Terra, materiaaldruk. </p>
            <h4>Woensdagmiddag</h4>
            <p>Bianca Tangande, polymeerets, zeefdruk.</p>
            <br>

            <h4>Donderdagochtend</h4>
            <p>Henny Schakenraad, zeefdruk.<br>
                Kristel van Genugten, coördinator.</p>
            <h4>Donderdagmiddag</h4>
            <p>Helma Veugen, lithografie.<br>
                Maartje van der Kruijs, beheer zeefdrukwerkplaats</p>
            <br>

            <h4>Vrijdagochtend</h4>
            <p>
                Madeleen Dijkman, textieldruk, zeefdruk.<br>
                Peter Koene, algemeen werkplaatsbeheer.
            </p>
            <h4>Vrijdagmiddag</h4>
            <p>Peter Koene, algemeen werkplaatsbeheer</p>
            <br>
            <h4>Zaterdagmiddag</h4>
            <p>Wisselende bezetting</p>
            <h4>Kosten</h4>
            <p> <a href="fedha.nl/prijzen">Prijslijst 2017</a></p>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>