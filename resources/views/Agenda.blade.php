<?php
use function Composer\Autoload\includeFile;
?>
<html>
</html>
<head>
<link rel="stylesheet" type="text/css"
	href="{{ URL::asset('css/app.css') }}">
	
<script src="{{ URL::asset('js/app.js') }}"></script>

</head>
<body>

@include('layouts.header', array('title'=>'Agenda'))
	<div class="content">
<?php
$day = date ( 'w' );
$week_offset = 0;

if ($_POST != null and array_key_exists ( "submit", $_POST ) and array_key_exists ( "offset", $_POST )) {
	
	switch ($_POST ["submit"]) {
		case "Last Week" :
			$week_offset = $_POST ["offset"] - 1;
			break;
		case "Next Week" :
			$week_offset = $_POST ["offset"] + 1;
			break;
	}
}

include '../resources/lang/LanguageConverter.php';

echo "<div class=\"agenda\">";

$zCounter = 1;
while ( $zCounter <= 5 ) {
	// black magic, gets the moneday of this week. counter ofsets the day bt one and week ofsett the entire week.
	$week_day = date ( 'D d F', strtotime ( '-' . ($day - $zCounter - ($week_offset * 7)) . ' days' ) );
	
	// can be used for selecting the agendafor a specific day.
	// $week_day = date("d-m-Y", strtotime ( '-' . ($day - $counter - ($week_offset * 7)) . ' days' ));
	$test = new LanguageConverter ();
	echo "<div class =\"Agenda_Day\"> ";
	echo "<h1>" . $test->dateConverter ( $week_day ) . " </h1>";
	
	// time table creation
	echo "<div class=\"Agenda_timeTable_Wrapper\">";
	echo "<table class=\"Agenda_timeTable\">";
	
	$xCounter = 0;
	$yCounter = 0;
	$timeList = array (
			0 => '0:00',
			1 => '1:00',
			2 => '2:00',
			3 => '3:00',
			4 => '4:00',
			5 => '5:00',
			6 => '6:00',
			7 => '7:00',
			8 => '8:00',
			9 => '9:00',
			10 => '10:00' 
	);
	$eventList = array (
			1 => 'Reservering - Hugo Bosch',
			2 => 'School uitje, de korte steeg.',
			3 => 'Tandarts - Mirjam',
			4 => 'Hugo',
			5 => 'Hugo',
			6 => 'Hugo',
			7 => 'Hugo',
			8 => 'Hugo' 
	);
	
	while ( $xCounter < 4 ) {
		echo "<tr class=\"Agenda_row\">";
		
		if ($xCounter != 0) {
			echo "<td class= \"Agenda_cell_Event\">" . $eventList [$xCounter] . "</td>";
		} else {
			echo "<td class= \"Agenda_cell_Event\"></td>";
		}
		$yCounter = 0;
		while ( $yCounter < 10 ) {
			
			if ($xCounter == 0) {
				echo "<td class=\"Agenda_tijd_cell\">" . $timeList [$yCounter + 1] . "</td>";
				$yCounter ++;
				continue;
			}
			if (rand ( 0, 2 ) == 1) {
				echo "<td class=\"Agenda_cell\"></td>";
			} else {
				echo "<td class=\"Agenda_filled_cell\"></td>";
			}
			$yCounter ++;
		}
		$xCounter ++;
		echo "</tr>";
	}
	
	echo "</table>";
	echo "</div>";
	echo "</div>";
	$zCounter ++;
}

echo "</div>"?>


	</div>
@include('layouts.footer')
	
</body>
