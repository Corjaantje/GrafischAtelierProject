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
		
		$this->newsItems[0] = "This item does not exist";
		$this->newsItems[1] = new NewsItem (array(
				"KarinSchreppersFallingLeaf.jpg",
				"PeterKoeneOmhelsDeNacht.jpg" 
		), array(
				"Karin Schreppers, Falling Leaf",
				"Peter Koene, Omhels de nacht" 
		), $sample1, $textArt1);
		
		$this->newsItems[2] = new NewsItem (array(
				"PeterKoeneOmhelsDeNacht.jpg" 
		), "Hello", $sample1, $textArt1);
	
	}

	public function getNewsItem($index) {

		if (isset ($this->newsItems[$index])) {
			return $this->newsItems[$index];
		} else {
			return null;
		}
	
	}

}