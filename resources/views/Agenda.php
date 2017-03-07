<html>
</html>
<head>
<title>Agenda</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
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
include_once 'LanguageConverter.php';

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
	while ( $xCounter < 4 ) {
		echo "<tr class=\"Agenda_row\">";
		
		echo "<td class= \"Agenda_cell_Event\">Event: " . $xCounter . "</td>";
		
		$yCounter = 0;
		while ( $yCounter < 12 ) {
			
			if ($xCounter == 0) {
				echo "<td class=\"Agenda_cell\">Tijd</td>";
				$yCounter ++;
				continue;
			}
			echo "<td class=\"Agenda_cell\">test</td>";
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




<form action="Agenda.php" method=post>
			<input type="text" style="display: none" name="offset"
				value=<?php echo $week_offset;?> /> <input type="submit"
				name="submit" value="Last Week" /> <input type="submit"
				name="submit" value="Next Week" />
		</form>

	</div>
</body>
