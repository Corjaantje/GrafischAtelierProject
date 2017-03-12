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
@include('layouts.header', array('title'=>'Aan de slag'))
<div class="container bigText">
    <h1 class="title">Workshops & Cursusaanbod</h1>
    <h3 class="nv-subtitle text-center">
        Op deze pagina vindt u de komende workshops en cursussen die aangeboden worden binnen het Grafisch Atelier Den Bosch.
        Bij elk aanbod is een korte omschrijving gegeven van het aanbod, en door op de titel te klikken kunt u meer details te zien krijgen.
    </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Watervrije non toxische Lithografie</h1>
            <p>
            10 maart van 09.30-16.00<br />
            door Ingrid Menge<br /><br />

            Nik Semenoff heeft deze techniek uitgewerkt tot een volwaardige druktechniek zonder gebruik van water en als extra bijkomend voordeel; zonder schadelijke zuren. Het materiaal waarop getekend wordt is licht en goedkoop en kan afgedrukt worden onder een etspers.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Boekbinden</h1>
            <p>
            27 mei van 09.00-16.30<br />
            door Truzanne Lousberg<br /><br />

            Het boekbinden is een prachtige maar al bijna vergeten techniek. In deze workshop leert u zelf boeken te binden, katernen te maken, de looprichting van het papier te herkennen en prachtige omslagen te maken. Aan het einde van de workshop gaat u naar huis met een prachtig boekje met harde kaft.
            </p>
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Kitchenlitho</h1>
            <p>
            18 maart van 10.00-13.00<br />
            door Hannah de Haan<br /><br />

            Kitchen-litho is een nieuwe manier van litho's (vlakdruk) maken: goedkoop, non-toxic, niet moeilijk en vooral heel erg leuk. De keuken-litho is gebaseerd op het principe van de lithografie, een techniek waarbij vet en water elkaar afstoten. Met alledaagse huishoudelijke middelen kan je een kunstwerkje, kaartjes, uitnodigingen, etc maken.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Basiscursus zeefdruk</h1>
            <p>
            22, 29 maart en 5 april van 10.00-16.00<br /><br />

            Deze workshop is bedoeld voor iedereen die wil leren zeefdrukken. Voor kunstenaars en vormgevers, maar ook voor eenieder die zelfstandig tasjes, posters of ansichtkaarten wil kunnen drukken.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Cyanotype</h1>
            <p>
            13 mei van 10.00-12.30<br />
            door Rens Horn<br /><br />

            In 1842 ontdekte de Engelse fotopionier Sir John Herschel een oplossing van twee ijzerzouten die na droging lichtgevoelig is. Door belichting vormen deze twee ijzerzouten een onoplosbare.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <h1 class="subtitle">Aankomende workshops;</h1>
            <p>
            • Materiaaldruk - Roos Terra <br />
            • Basiscursus Etsen - Peter Koene <br />
            • Zeefdruk op keramiek - Ingrid Wens <br />
            • Experimental Textile Design <br /><br />

            Wilt u op de hoogte blijven van het cursus en workshop aanbod, mail dan naar educatie@gadenbosch.nl of schrijf u in voor de nieuwsbrief.
            </p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <img src="http://gadenbosch.nl/fotosworkshops/27_Toyobo%20(3).jpg" vspace="50"></img>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <img src="http://www.gadenbosch.nl/fotoseducatie/3_217_materiaaldruk%20web%201.jpg" vspace="50"></img>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-6">
            <img src="http://www.gadenbosch.nl/fotoseducatie/3_AAC_3638%203.jpg" vspace="50"></img>
        </div>

        </div>
</div>
@include('layouts.footer')
</body>
</html>