<html>
</html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="content">
<?php
$day = date ( 'w' );
$week_offset = 0;

echo "<div class=\"agenda\">";

$counter = 1;
while ( $counter <= 5 ) {
	// black magic, gets the moneday of this week. counter ofsets the day bt one and week ofsett the entire week.
	$Monday = date ( 'D d F', strtotime ( '-' . ($day - $counter - ($week_offset * 7)) . ' days' ) );
	
	echo "<div class =\"Agenda_Day\"> ";
	echo "<h1>" . $Monday . " </h1>";
	?>
	<table class="Agenda_timeTable">
	<tr class="Agenda_row"><td class="Agenda_cell">a</td> </tr>
	<tr class="Agenda_row"><td class="Agenda_cell">b</td> </tr>
	<tr class="Agenda_row"><td class="Agenda_cell">c</td> </tr>
	<tr class="Agenda_row"><td class="Agenda_cell">d</td> </tr>
	<tr class="Agenda_row"><td class="Agenda_cell">e</td> </tr>


	
	
	
	
	
	</table>
	
	
	
<?php
	echo "</div>";
	
	$counter ++;
}

echo "</div>"?>



<?php include 'Calender.php'; ?>
</div>
</body>
