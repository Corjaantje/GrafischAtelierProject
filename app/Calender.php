<?php
$time = time ();
$current_day = date ( "d", $time );
$current_month = date ( "m", $time );
$current_year = date ( "Y", $time );

$first_day = mktime ( 0, 0, 0, $current_month, 1, $current_year );

$title = date ( "F", $first_day );

$blank_days = 0;
$current_day_name = date ( "D", $first_day );

switch ($current_day_name) {
	case "Mon" :
		$blank_days = 0;
		break;
	case "Tue" :
		$blank_days = 1;
		break;
	case "Wed" :
		$blank_days = 2;
		break;
	case "Thu" :
		$blank_days = 3;
		break;
	case "Fri" :
		$blank_days = 4;
		break;
	case "Sat" :
		$blank_days = 5;
		break;
	case "Sun" :
		$blank_days = 6;
		break;
}
echo $title . " " . $current_year;
echo "<table class= \"agenda\" border=\"1px solidblack\">";
echo "<tr class=\"calender_row\">";

// adds blanks at the start of the month.
$tr_counter = 0;
while ( $blank_days > 0 ) {
	echo "<td class=\"blank_calender_cell\">test</td>";
	$blank_days --;
	$tr_counter ++;
}

// creates cells with the date.
$counter = 1;
$days_in_month = date ( "t", date ( "n", $first_day ) );
while ( $counter <= $days_in_month ) {
	echo "<td class=\"calender_cell\">" . $counter . "</td>";
	$counter ++;
	
	// start a new row afther the current one has been filled with 7.
	$tr_counter ++;
	if ($tr_counter >= 7) {
		echo "</tr><tr class=\"calender_row\">";
		$tr_counter = 0;
	}
}

// adds extra blank fields at the end of the month.
$extra_blanks = 7 - $tr_counter;
$counter = 0;
while ( $counter < $extra_blanks ) {
	echo "<td class=\"blank_calender_cell\">test</td>";
	$counter ++;
}

echo "</table>"?>