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
@include('layouts.header', array('title'=>'schools'))
<div class="container bigText">
    <h1 class="title">Scholen</h1>
    <div class="row"><br />
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <p>
                Het Grafisch Atelier is een zeer geschikte plek voor workshops. We maken workshops op maat, naar behoeften en wensen van de school. Hierbij houden wij rekening met de culturele ladekast. Het Grafisch Atelier heeft diverse ervaren docenten voor begeleiding hierbij.<br /><br />

                Hieronder een aantal voorbeelden van workshops; Prijzen zijn op aanvraag. Verrekening kan eventueel plaats vinden via de Cultuurkaart van het CJP. Voor meer informatie stuur een email naar <b>educatie@gadenbosch.nl</b>.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <p>
                Duur 2,5 uur<br />
                Aantal leerlingen: 10<br />
                1 docent van het GA en 1 begeleider van school<br />
                <br /><br />
                De zeefdruk techniek is ontstaan uit de sjabloontechniek, waarmee in vroegere eeuwen stoffen en behang werden bedrukt. De grote doorbraak van deze techniek werd bereikt door de pop-art en kunstenaars als Andy Warhol met de serie zeefdrukken van bekende filmsterren.
                <br /><br />
                In deze workshop druk je op textiel. Je ontwerpt een eigen persoonlijk  logo op A4 formaat, geschikt voor op  een T-shirt. Het ontwerp bestaat uit een combinatie van letters en vormen, maar hoeft niet perse leesbaar te zijn. Denk na over wat een sterke vorm is en welk lettertype je gebruikt of verzint. Ook aspecten uit de graffiti en popcultuur zijn bruikbaar. In de workshop worden je ook basishulpvormen aangereikt.
                Kernwoorden: toegepaste kunst, aanpakken, initiatief, creativiteit, niet bang voor mislukkingen op de leerweg.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Workshop Krassen als Rembrandt</h1>
            <p>
                Duur: 2,5u<br />
                Aantal leerlingen: 14<br />
                1 docent van het GA en 1 begeleider van school<br />
                <br /><br />
                Grafiek, wat is het? Het afdrukken middels een druktechniek. Een bekende vorm is de droge naald. Je krast een tekening in een metalen plaatje, wrijft er inkt in en drukt dat af onder de pers. Rembrandt was er een meester in. Oorspronkelijk is deze techniek uitgevonden als manier om je tekening te kunnen reproduceren. In onze tijd van massaproductie juist een techniek die bijzonder en uniek is.
                Kernwoorden: tekenen, spelen, kracht, lijnenspel en heel veel plezier!
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <p>
                <img src="http://www.gadenbosch.nl/gifs/stopmotion3.gif"><br />
            <p>Animatie: Moniek Dams</p>
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Workshop Zo plat als een dubbeltje</h1>
            <p>
                Duur 2,5 uur<br />
                Aantal leerlingen: 14<br />
                1 docent van het GA en 1 begeleider van school<br /><br />

                De allereerste drukvormen zijn het aller persoonlijkst: de afdrukken van handen in prehistorische grotten zijn de vroegst bekende  grafische tekens van de mens. Je kunt ook allerlei materialen ininkten en afdrukken: gaas, planten, draden, allerlei platte  “dingetjes”en vormen. Voor deze workshop geldt: Je leert en gaat begrijpen door te doen.
                Kernwoorden: experimenteren, verwonderen, lef en niet bang voor vuile handen!
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Workshop Ontwerp je eigen logo</h1>
            <p>
                <img src="http://www.gadenbosch.nl/fotoseducatie/4_IMG_1399_webok.jpg"><br /><br />
                <img src="http://www.gadenbosch.nl/fotoseducatie/4_Zeefdruk%20St%20Jans%20mei%202014.jpg">
            </p>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>