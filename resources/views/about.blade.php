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
	@include('layouts.header', array('title'=>'Over Ons'))
		<div class="container">
			<div class="title">
				<h3>Over ons</h3>
			</div>
			<div class="row">

				<div class="col-md-6">
					<b><p>Contact en Info</p></b>
					<p>
						Kristel van Genugten - Coördinator
                        <br>
						Peter Koene - Algemeen werkplaatsbeheer
						<br>
                        Maartje van der Kruijs - Beheer zeefdrukafdeling
						<br>
                        Nico Thöne - Projectmedewerker Educatie
                        <br>
					</p>


					<b><p>
							Bestuursleden
						</p></b>
                    <p>
						<ul>
							<li>Jan Ramaekers – voorzitter</li>
							<li>Hans Koppens – penningmeester</li>
							<li>Gerard Pels – bestuurslid</li>
							<li>Roos Terra – bestuurslid</li>
							<li>Peter Korsman – bestuurslid</li>
							<li>Hans Derks – bestuurslid</li>
						</ul>
					</p>


						<b><p>
                        Doelstellingen Grafisch Atelier Den Bosch:
							</p></b></div>
                    <ol>
                        <li>Het bieden van grafische werkplaatsfaciliteiten voor kunstenaars</li>
                        <li>Educatie en kennisoverdracht</li>
                        <li>Aanbieden van exposities en projecten met een relatie tot grafische kunst en vormgeving</li>
                    </ol>
                    </p>

                    <a href="http://gadenbosch.nl/pdfs/jaarverslag2015DEF.pdf">Jaarverslag 2015</a>
				</div>

				<div class="col-md-6">
                    <b>
					<p>
                        Adresgegevens
					</p></b>
                    Boschveldweg 471A<br>
                    5211 VK ‘s-Hertogenbosch<br>
                    T +31 (0)736 134 277<br>
                    <a href="mailto:info@gadenbosch.nl">info@gadenbosch.nl</a><br>

                    <ul>
                        <li>IBAN: NL21INGB0005275472</li>
                        <li>BIC: INGBNL2A</li>
                        <li>RSIN/Fiscaal nummer: 0082 31 424</li>
                        <li>Kamer van Koophandel nummer: 41082086 0000</li>
                    </ul>
                    </p>
					<b><p>Openingstijden</p></b>
					<p>
						ma t/m vrij van 9:00 - 17:00<br>
						za van 13:00 - 17:00<br>
					</p>
					<p>
						GA Den Bosch Gesloten:
					</p>
					<p>Op 27 en 28 februari 2017, tijdens carnaval, zijn wij gesloten.</p>
				</div>


			<!-- Google Maps -->
			<div id="google-map"></div>
			<script>
                function initMap() {
                    var uluru = {lat: 51.69545, lng: 5.29674};
                    var map = new google.maps.Map(document.getElementById('google-map'), {
                        zoom: 14,
                        center: uluru
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                    });
                }
			</script>
			<script async defer
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxrbCMt-RKFchvRagS6Mime0eUUqokIbM&callback=initMap">
			</script>
			<br>
			<br>
		</div>
		</div>
	@include('layouts.footer')
	</body>
</html>