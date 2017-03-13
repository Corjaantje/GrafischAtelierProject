<?php
class LanguageConverter {

	public function dateConverter($date) {
		
		$dateArray = explode( " ", $date );
		switch ($dateArray [0]) {
			case "Mon" :
				$dateArray [0] = "Maandag";
				break;
			case "Tue" :
				$dateArray [0] = "Dinsdag";
				break;
			case "Wed" :
				$dateArray [0] = "Woensdag";
				break;
			case "Thu" :
				$dateArray [0] = "Donderdag";
				break;
			case "Fri" :
				$dateArray [0] = "Vrijdag";
				break;
			case "Sat" :
				$dateArray [0] = "Zaterdag";
				break;
			case "Sun" :
				$dateArray [0] = "Zondag";
				break;
		}
		
		switch ($dateArray [2]) {
			case "January" :
				$dateArray [2] = "January";
				break;
			case "February" :
				$dateArray [2] = "Februari";
				break;
			case "March" :
				$dateArray [2] = "Maart";
				break;
			case "April" :
				$dateArray [2] = "April";
				break;
			case "May" :
				$dateArray [2] = "Mei";
				break;
			case "June" :
				$dateArray [2] = "Juni";
				break;
			case "July" :
				$dateArray [2] = "Juli";
				break;
			case "August" :
				$dateArray [2] = "Augustus";
				break;
			case "September" :
				$dateArray [2] = "September";
				break;
			case "October" :
				$dateArray [2] = "October";
				break;
			case "November" :
				$dateArray [2] = "Nobember";
				break;
			case "December" :
				$dateArray [2] = "December";
				break;
		}
		$return = $dateArray [0] . " " . $dateArray [1] . " " . $dateArray [2];
		return $return;
	}
}

?>