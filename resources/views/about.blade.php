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
		<div class="title text-center">
			<h1>Over het Grafisch Atelier Den Bosch</h1>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Contact en Info</h1>
					<p>
						<b>Kristel van Genugten</b> - Coördinator
                        <br>
						<b>Peter Koene</b> - Algemeen werkplaatsbeheer
						<br>
                        <b>Maartje van der Kruijs</b> - Beheer zeefdrukafdeling
						<br>
                        <b>Nico Thöne</b> - Projectmedewerker Educatie
                        <br>
					</p>


						<h3>
							Bestuursleden
						</h3>
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

                    <p>
                    <h3>
                        Doelstellingen Grafisch Atelier Den Bosch:
                    </h3>
                    <ol>
                        <li>Het bieden van grafische werkplaatsfaciliteiten voor kunstenaars</li>
                        <li>Educatie en kennisoverdracht</li>
                        <li>Aanbieden van exposities en projecten met een relatie tot grafische kunst en vormgeving</li>
                    </ol>
                    </p>

                    <a href="http://gadenbosch.nl/pdfs/jaarverslag2015DEF.pdf">Jaarverslag 2015</a>
				</div>

				<div class="col-md-6">
                    <p>
                    <h1>
                        Adresgegevens
                    </h1>
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
					<h3>Openingstijden</h3>
					<p>
						ma t/m vrij van 9:00 - 17:00<br>
						za van 13:00 - 17:00<br>
					</p>
					<h3>
						GA Den Bosch Gesloten:
					</h3>
					<p>Op 27 en 28 februari 2017, tijdens carnaval, zijn wij gesloten.</p>
				</div>
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
	@include('layouts.footer')
	</body>
</html>