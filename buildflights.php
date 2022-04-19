<?php

include 'creds.inc';

// Select the unique flights by flight number, aircraft type, origin, destination and departure/arrival times

$query1 = "SELECT DISTINCT ident , origin , destination , aircrafttype , duration , dep_local , arr_local FROM flightstemp ORDER by ident ASC";

//Run the query

$result1 = mysqli_query ($link, $query1) or die(mysqli_error($link));

// Put returned flights into the final flights table 

while ($row1 = mysqli_fetch_array ($result1, MYSQLI_ASSOC)) {
	
	$query2 = "INSERT INTO flights (flight_number , dep_icao , arr_icao , dep_time , arr_time , duration , aircraft) 
	VALUES ('$row1[ident]' , '$row1[origin]' , '$row1[destination]' , '$row1[dep_local]' , '$row1[arr_local]' , 
	'$row1[duration]' , '$row1[aircrafttype]')";

	$result2 = mysqli_query ($link, $query2) or die(mysqli_error($link));
	}

//Need to update each flight with the days of the week that they are flown

$query3 = "SELECT * FROM flightstemp WHERE 1";

$result3 = mysqli_query ($link, $query3) or die(mysqli_error($link));

while ($row3 = mysqli_fetch_array ($result3, MYSQLI_ASSOC)) { 

$day = $row3['dep_day_local'];

//Switch between Cases for each day of a week

switch ($day) {

	case "Mon":

	$query_mon = "UPDATE flights SET mon = REPLACE(mon, '0','1') 
	WHERE flight_number = '$row3[ident]' AND dep_icao = '$row3[origin]' AND arr_icao = '$row3[destination]' 
	AND dep_time = '$row3[dep_local]' AND arr_time = '$row3[arr_local]' AND aircraft = '$row3[aircrafttype]'";

	$result_mon = mysqli_query ($link, $query_mon) or die(mysqli_error($link));

	break;


	case "Tue":

	$query_tue = "UPDATE flights SET tue = REPLACE(tue, '0','1') 
	WHERE flight_number = '$row3[ident]' AND dep_icao = '$row3[origin]' AND arr_icao = '$row3[destination]' 
	AND dep_time = '$row3[dep_local]' AND arr_time = '$row3[arr_local]' AND aircraft = '$row3[aircrafttype]'";

	$result_tue = mysqli_query ($link, $query_tue) or die(mysqli_error($link));

	break;

	case "Wed":

	$query_wed = "UPDATE flights SET wed = REPLACE(wed, '0','1') 
	WHERE flight_number = '$row3[ident]' AND dep_icao = '$row3[origin]' AND arr_icao = '$row3[destination]' 
	AND dep_time = '$row3[dep_local]' AND arr_time = '$row3[arr_local]' AND aircraft = '$row3[aircrafttype]'";

	$result_wed = mysqli_query ($link, $query_wed) or die(mysqli_error($link));

	break;

	case "Thu":

	$query_thu = "UPDATE flights SET thu = REPLACE(thu, '0','1') 
	WHERE flight_number = '$row3[ident]' AND dep_icao = '$row3[origin]' AND arr_icao = '$row3[destination]' 
	AND dep_time = '$row3[dep_local]' AND arr_time = '$row3[arr_local]' AND aircraft = '$row3[aircrafttype]'";

	$result_thu = mysqli_query ($link, $query_thu) or die(mysqli_error($link));
	
	break;


	case "Fri":

	$query_fri = "UPDATE flights SET fri = REPLACE(fri, '0','1') 
	WHERE flight_number = '$row3[ident]' AND dep_icao = '$row3[origin]' AND arr_icao = '$row3[destination]' 
	AND dep_time = '$row3[dep_local]' AND arr_time = '$row3[arr_local]' AND aircraft = '$row3[aircrafttype]'";

	$result_fri = mysqli_query ($link, $query_fri) or die(mysqli_error($link));

	break;


	case "Sat":

	$query_sat = "UPDATE flights SET sat = REPLACE(sat, '0','1') 
	WHERE flight_number = '$row3[ident]' AND dep_icao = '$row3[origin]' AND arr_icao = '$row3[destination]' 
	AND dep_time = '$row3[dep_local]' AND arr_time = '$row3[arr_local]' AND aircraft = '$row3[aircrafttype]'";

	$result_sat = mysqli_query ($link, $query_sat) or die(mysqli_error($link));

	break;

	case "Sun":

	$query_sun = "UPDATE flights SET sun = REPLACE(sun, '0','1') 
	WHERE flight_number = '$row3[ident]' AND dep_icao = '$row3[origin]' AND arr_icao = '$row3[destination]' 
	AND dep_time = '$row3[dep_local]' AND arr_time = '$row3[arr_local]' AND aircraft = '$row3[aircrafttype]'";

	$result_sun = mysqli_query ($link, $query_sun) or die(mysqli_error($link));

	break;

	}

}

//Close DB and End

mysqli_close($link);

?>
