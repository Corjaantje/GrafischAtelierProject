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
                <h3><b>Welkom in de mooiste grafiekwerkplaats van Nederland!</b> </h3>
                <p>Het Grafisch Atelier biedt kunstenaars, vormgevers en creatieven een goed geoutilleerde werkplaats met deskundige ondersteuning en een omgeving om te experimenteren. In het GA wordt zoveel mogelijk gewerkt met non-toxic materialen.</p>
            </div>

            <div>
                <b><p>Aan de slag</p></b>
                <p>Reserveer van te voren een werkplek. Dit kan telefonisch, via de email of middels de agenda die in de werkplaats ligt. Kun je niet komen? Meld je dan af. Anders zijn wij genoodzaakt kosten in rekening te brengen voor de tijd dat je de werkplek hebt gereserveerd.</p>

                <h3>Voor het eerst aan de slag in het GA? </h3>
                <p>Je bent verplicht een introductie te volgen. Als je in het GA een cursus hebt gevolgd in de techniek waarin je aan de slag gaat, dan staat dit gelijk aan een introductie.</p>
            </div>

            <p><b>Technieken</b></p>
            <b><p>Zeefdruk</p></b>
            <p>Er zijn 5 zeefdruktafels met vacuümafzuiging: een zeefdruktafel voor maximaal A1 formaat, drie tafels voor A2 formaat  en een tafel voor A3 formaat. Verder hebben we een grote collectie zeeframen in allerlei formaten.</p>

            <b><p>Hoogdruk en diepdruk</p></b>
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

            <b><p>Steendruk</p></b>
            <p>De lithopers van het GA is een handaangedreven mechanische pers, met een druktafel van 80 x 120 cm. Er zijn zo’n 50 lithostenen aanwezig, van diverse maten. </p>

            <b><p>Cyanotype & gomdruk</p></b>
            <p>Voor het maken van cyanotype en gomdruk hebben wij een mooie DOKA, belichter en diverse papieren.</p>

            <b><p>Kopieermachine</p></b>
            <p>Met de kopieermachine kunnen transparanten tot A3 formaat worden gemaak. Ook grotere formaten zijn in overleg mogelijk. Neem hiervoor contact op met het GA.</p>

            <b><p>Te koop</p></b>
            <p>Heb je materialen nodig? Dan kun je ook bij ons terecht. Wij hebben vele soorten materialen voor alle technieken te koop. Zie hiervoor onze <a href="fedha.nl/prijzen">prijslijst</a>.</p>
        </div>

        <div class="col-md-3">
            <b><p>Openingstijden werkplaats</p></b>
            <p>Maandag tot en met vrijdag: 09:00 - 17:00<br>Zaterdag vanaf 13:00</p>

            <b><p>Beheerders</p></b>

            <b><p>Maandagochtend</p></b>
            <p>Kristel van Genugten (tot 14.30 u), coördinator.<br>
                Maartje van der Kruijs, beheer zeefdrukwerkplaats.<br>
                Nico Thöne, medewerker educatie en workshops.
            </p>
            <b><p>Maandagmiddag</p></b>
            <p>
                Marie-Louise Wasiela, ets, zeefdruk.
            </p>
            <br>
            <b><p>Dinsdag</p></b>
            <p>
                Kristel van Genugten (tot 14.30 u), coördinator.<br>
                Peter Koene, algemeen werkplaatsbeheer.<br>
                Willemijn van Dorp, zeefdruk.</p>
            <br>
            <b><p>Woensdagochtend</p></b>
            <p>Roos Terra, materiaaldruk. </p>
            <p>Woensdagmiddag</p>
            <p>Bianca Tangande, polymeerets, zeefdruk.</p>
            <br>

            <b><p>Donderdagochtend</p></b>
            <p>Henny Schakenraad, zeefdruk.<br>
                Kristel van Genugten, coördinator.</p>
            <b><p>Donderdagmiddag</p></b>
            <p>Helma Veugen, lithografie.<br>
                Maartje van der Kruijs, beheer zeefdrukwerkplaats</p>
            <br>

            <b><p>Vrijdagochtend</p></b>
            <p>
                Madeleen Dijkman, textieldruk, zeefdruk.<br>
                Peter Koene, algemeen werkplaatsbeheer.
            </p>
            <b><p>Vrijdagmiddag</p></b>
            <p>Peter Koene, algemeen werkplaatsbeheer</p>
            <br>
            <b><p>Zaterdagmiddag</p></b>
            <p>Wisselende bezetting</p>
            <p>Kosten</p>
            <p> <a href="fedha.nl/prijzen">Prijslijst 2017</a></p>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>