<?php

include 'creds.inc';

// Select the dep and arr times to determine duration

$query1 = "SELECT id, departuretime , arrivaltime FROM flightstemp WHERE 1";

//Run the query

$result1 = mysqli_query ($link, $query1) or die(mysqli_error($link));

//Generate Duration

while ($row = mysqli_fetch_array ($result1, MYSQLI_ASSOC)) {

	$duration = $row['arrivaltime'] - $row['departuretime'];

	//Convert from seconds to HMS

	$duration = gmdate("H:i:s", (int)$duration);

	//Insert duration into the table

	$query2 = "UPDATE flightstemp SET duration = '$duration' WHERE id = $row[id]"; 

	$result2 = mysqli_query ($link, $query2) or die(mysqli_error($link));

}

// Select the dep time to determine local time and day from locations table join 

$query2 = "SELECT flightstemp.id , flightstemp.origin , flightstemp.departuretime, locations.timezone FROM flightstemp INNER JOIN locations ON flightstemp.origin = locations.code;";

//Run the query

$result2 = mysqli_query ($link, $query2) or die(mysqli_error($link));

//Convert to Local Departure Time and Day

while ($row = mysqli_fetch_array ($result2, MYSQLI_ASSOC)) {

	$date_origin=date_create();

	date_timestamp_set($date_origin,$row['departuretime']);

	date_timezone_set($date_origin,timezone_open($row['timezone']));

	$dep_time = date_format($date_origin,"H:i:s");
	$dep_day = date_format($date_origin, "D");
	
	//Update origin date and time in table

	$query3 = "UPDATE flightstemp SET dep_local = '$dep_time' , dep_day_local = '$dep_day' WHERE id = $row[id]"; 

	$result3 = mysqli_query ($link, $query3) or die(mysqli_error($link));

}

// Select the arr time to determine local time from locations table join 

$query4 = "SELECT flightstemp.id , flightstemp.destination , flightstemp.arrivaltime, locations.timezone FROM flightstemp INNER JOIN locations ON flightstemp.destination = locations.code;";

//Run the query

$result4 = mysqli_query ($link, $query4) or die(mysqli_error($link));

//Convert to Local Arrival Time

while ($row1 = mysqli_fetch_array ($result4, MYSQLI_ASSOC)) {

	$date_destination=date_create();

	date_timestamp_set($date_destination,$row1['arrivaltime']);

	date_timezone_set($date_destination,timezone_open($row1['timezone']));

	$arr_time = date_format($date_destination,"H:i:s");
		
	//Update origin date and time in table

	$query5 = "UPDATE flightstemp SET arr_local = '$arr_time' WHERE id = $row1[id]"; 

	$result5 = mysqli_query ($link, $query5) or die(mysqli_error($link));

}

//Close DB and End

mysqli_close($link);

?>
