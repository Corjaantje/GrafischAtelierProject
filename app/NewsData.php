<?php

namespace App;

class NewsData {

	public $newsItems;

	public function __construct() {

		$this->loadAllNews ();
	
	}

	private function loadAllNews() {
		
		// text variables
		$textArt1 = "
					<h3>Tentoonstelling GA Grafiekkalender I</h3>
			
					<p>Ook voor 2017 maakte Grafisch Atelier Den Bosch een exclsuieve grafiekkalender. Dit keer kan de koper zelf een kalender van 12 samenstellen uit een aanbod van 18 verschillende prenten. In de loop van het jaar zullen we drie tentoonstellingen maken met telkens zes deelnemers aan de kalender. Tijdens de eerste editie zal werk te zien zijn van Martin Copier, Willemijn van Dorp, Peter Koene, Judith Rosema, Marie-Louise Saanen en Karin Schreppers.</p>
					<p>Wij nodigen u van harte uit aanwezig te zijn op de opening op <strong>zaterdag 4 maart om 16.00 uur.</strong></p>
					<p>Er zijn nog steeds enkele exemplaren van de kalender te koop. Bestellen kan bij het Grafische Atelier of <a href=\"http://www.gadenbosch.nl/shop.php\">online op de website.</a></p>
				";
		$sample1 = "
				Tentoonstelling GA Grafiekkalender I
				<br>
				Ook voor 2017 maakte Grafisch Atelier Den Bosch een exclsuieve grafiekkalender. Dit keer kan de koper zelf een kalender van 12 samenstellen uit een aanbod van 18 verschillende prenten.
				";
		
		$textArt2 = "<h3>Vrijwilligersvacatures bij het GA</h3><p><strong>Het Grafisch Atelier Den Bosch is een werkplaats waar geexperimenteerd kan worden met de grafische technieken. Een plek, in de Willem Twee, waar kunstenaars, vormgevers, studenten, scholieren, amateurs en andere geinteresseerden zelfstandig kunnen werken, cursussen en workshops kunnen volgen en exposities komen bekijken. Het atelier is zes dagen per week geopend en dit zou niet mogelijk zijn zonder de inzet van onze vrijwilligers. Om de gasten zo goed mogelijk van dienst te kunnen zijn zouden wij ons vrijwilligersteam graag uitbreiden met een aantal oproepkrachten en een vrijwilliger marketing &amp; communicatie.</strong></p>
					<p><span style=\"color: #ff0000;\"><strong>Vacature vrijwilliger</strong></span> (oproepkracht)</p>
					<p>Een vrijwillige oproepkracht springt af en toe bij voor druks-avonden, projecten, zaterdagmiddagen en/of valt in bij ziekte van de vaste vrijwilligers. In ruil voor je inzet mag je evenredig veel tijd gratis werken in het atelier. Daarnaast kun je tegen gereduceerd tarief deelnemen aan &eacute;&eacute;n cursus of workshop per jaar.</p>
					<p>Heb je ervaring met grafische technieken en lijkt het je leuk om als vrijwilliger aan het GA verbonden te zijn, neem dan contact op via <a href=\"mailto:educatie@gadenbosch.nl\">educatie@gadenbosch.nl</a> of bel 073 6134277.</p>
					<p><span style=\"color: #ff0000;\"><strong>Vacature vrijwilliger marketing &amp; communicatie</strong></span> <br />(ca. 4 uur per week)</p>
					<p>Om alle activiteiten van het GA beter onder de aandacht te brengen heeft het GA behoefte aan ondersteuning door een vrijwilliger marketing en communicatie. Kun jij ons helpen met en heb je ervaring in het onderzoeken, opzetten en onderhouden van een marketing en communicatieplan? En heb je minimaal 4 uur per week beschikbaar? Dan zien we je reactie graag tegemoet. Mail <a href=\"mailto:organisatie@gadenbosch.nl\">organisatie@gadenbosch.nl</a> of bel 073 6134277</p>";
		
		$sample2 = "Vrijwilligersvacatures bij het GA
				<br>
				Het Grafisch Atelier Den Bosch is een werkplaats waar geexperimenteerd kan worden met de grafische technieken. Een plek, in de Willem Twee, waar kunstenaars, vormgevers, studenten, scholieren, amateurs en andere geinteresseerden";
		
		$textArt3 = "<h3>Documentaire over Dick Verdult in Docfeed Eindhoven</h3><p>Het documentairefestival Docfeed te Eindhoven opende met het \"Het is waar maar niet hier\", een portret van de kunstenaar Dick Verdult (62) door Luuk Bouwman. In de Volkskrant verscheen een enthousiaste recensie over de documentaire.</p>
					<p>JAARPRENT 2016<br />Dick Verdult, Dit is geen vakantiefilmpje <br />52 x 39 cm (papiermaat 70 x 50 cm) | gemengde techniek (inktjetprint, zeefdruk)</p>
					<p>Grafisch Atelier Den Bosch geeft jaarlijks een Jaarprent uit. Voor 2016 werd die prent ontworpen door Dick Verdult en gedrukt door medewerkers van Grafisch Atelier Den Bosch in een oplage van 50 stuks. <br />De prent is te koop voor 100 euro* .<br />Met de aankoop van onze Jaarprent steunt u direct het Grafisch Atelier.<br />In de Spiegelzaal van Willem Twee is t/m 26 februari 2017 een presentatie te zien van de jaarprent en ander werk van Dick Verdult.</p>
					<p>Lees ook in <a href=\"http://www.volkskrant.nl/recensies/het-is-waar-maar-niet-hier-is-een-opwekkend-elixir~a4462967/\" target=\"_blank\">de Volkskrant</a><br />Bekijk de prachtige documentaire <a href=\"http://www.omroepbrabant.nl/?epg/17946882/BrabantDoc+Dick+Verdult+-+Het+Is+Waar+Maar+Niet+Hier.aspx\" target=\"_blank\">via uitzending gemist </a>van Omroep Brabant!</p>
					<p>U kunt uw exemplaar van de Jaarprent 2016 nu kopen: <br />Neem contact op via info@gadenbosch.nl of 0736134277 of bezoek <br />Grafisch Atelier Den Bosch | Willem Twee, Boschdijkstraat 100 te Den Bosch</p>
					<p><span style=\"font-size: 12px;\">* Bent u vriend van Grafisch Atelier Den Bosch dan krijgt u op dit bedrag nog 10% korting</span></p>";
		
		$sample3 = "
				Documentaire over Dick Verdult in Docfeed Eindhoven
				<br>
				Het documentairefestival Docfeed te Eindhoven opende met het \"Het is waar maar niet hier\", een portret van de kunstenaar Dick Verdult (62) door Luuk Bouwman.
				";
		
		$textArt4 ="<h1>Jaarprent 2016</h1>
		    <p>Wij zijn bijzonder verheugd u op de valreep van het jaar onze Jaarprent 2016 te kunnen presenteren. Op ons verzoek ontworpen door duivelskunstenaar Dick Verdult, gedrukt door medewerkers van Grafisch Atelier Den Bosch in een oplage van 50 stuks. De prent is te koop voor 100 euro* en zal in januari bij gelegenheid van onze nieuwjaarsborrel ten doop gehouden worden. Met de aankoop van onze Jaarprent steunt u direct het Grafisch Atelier.
			 U kunt uw exemplaar nu al reserveren: info@gadenbosch.nl.
			</p><p><strong>Dick Verdult</strong> is filmmaker, beeldend kunstenaar, radiomaker en musicus. Hij heeft zich aan het begin van zijn carri&egrave;re met name beziggehouden met film en installaties. In deze periode was hij voornamelijk onafhankelijk werkzaam maar deed ook opdrachten voor onder andere de VPRO, de Boeddhistische Omroep Stichting en Joop van den Ende. Hij maakte ook diverse radioprogramma's voor onder andere het VPRO-programma De Wandelende Tak.<br /> Vanaf de millenniumwisseling is Dick Verdult in toenemende mate bezig met muziek. In het specifiek de volkse <em>cumbiamuziek</em>. Hij is de bedenker van de experimentele cumbias, die hij aanvankelijk de <em>cumbias lun&aacute;ticas</em> noemde. Onder het pseudoniem Dick El Demasiado bracht hij al diverse albums in deze muziekcategorie uit.</p>
			<p><span style=\"font-size: 12px;\">* Bent u vriend van Grafisch Atelier Den Bosch dan krijgt u op dit bedrag nog 10% korting</span></p>kk,ok,";
		
		$sample4 = "Jaarprent 2016
				<br>
		    	Wij zijn bijzonder verheugd u op de valreep van het jaar onze Jaarprent 2016 te kunnen presenteren. Op ons verzoek ontworpen door duivelskunstenaar Dick Verdult";
		
		$this->newsItems[0] = "This item does not exist";
		$this->newsItems[1] = new NewsItem (array(
				"KarinSchreppersFallingLeaf.jpg",
				"PeterKoeneOmhelsDeNacht.jpg" 
		), array(
				"Karin Schreppers, Falling Leaf",
				"Peter Koene, Omhels de nacht" 
		), $sample1, $textArt1);
		
		$this->newsItems[2] = new NewsItem (array(
				"45_CPB droge naald ets2.jpg" 
		), array(""), $sample2, $textArt2);
	
		$this->newsItems[3] = new NewsItem(array(
				"266_DickVerdult_Docfeed.jpg",
				"266_Dick_Verdult_GADenBosch_Jaarprent2016_FBKL.jpg"
		), array(
				"",
				"Dick Verdult, Dit is geen vakantiefilmpje"
		), $sample3, $textArt3);
		
		$this->newsItems[4] = new NewsItem(array(
				"265_DickVerdult_Jaarprent_2017_GrafischAtelierDenBosch.jpg"
		), array(
				"Jaarprent 2016: Dick Verdult, Dit is geen vakantiefilmpje 52 x 39 cm (papiermaat 70 x 50 cm) | gemengde techniek (inktjetprint, zeefdruk)"
		), $sample4, $textArt4);
		
	}

	public function getNewsItem($index) {

		if (isset ($this->newsItems[$index])) {
			return $this->newsItems[$index];
		} else {
			return null;
		}
	
	}

}