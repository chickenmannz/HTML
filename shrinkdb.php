<?php

include 'creds.inc';

//Keep the original table and copy the relevant data to flightstemp

$query0 = "CREATE TABLE flightstemp select * from AirlineFlightSchedules"; 

// Get rid of the non-airnz link and main flights
$query1 = "DELETE FROM flightstemp WHERE actual_ident NOT LIKE 'RLK%' AND actual_ident NOT LIKE 'NZ3%' AND actual_ident NOT LIKE ''";

//Get rid of the codeshare flights from the Link flights
$query2 = "DELETE FROM flightstemp WHERE ident NOT LIKE 'ANZ%'";

// At the moment the A321NEO is not showing up on Scheduled
$query3 = "UPDATE flightstemp SET aircrafttype = 'A21N' WHERE aircrafttype = ''";

//Rename ANZ flights to NZ to fit schema

$query5 = "UPDATE `flightstemp` SET ident = REPLACE(ident, 'ANZ', 'NZ')";

//Rename Mount Cook Flights from NZ3 to NZM

$query6 = "UPDATE `flightstemp` SET actual_ident = REPLACE(actual_ident, 'NZ3', 'NZM')";

//Remove unwanted columns

$query7 = "ALTER TABLE flightstemp 
	DROP COLUMN meal_service , 
	DROP COLUMN seats_cabin_business ,
	DROP COLUMN seats_cabin_coach ,
	DROP COLUMN seats_cabin_first";

$query8 = "ALTER TABLE flightstemp 
	ADD COLUMN duration TIME ,
	ADD COLUMN dep_local TIME ,
	ADD COLUMN arr_local TIME ,
	ADD COLUMN dep_day_local VARCHAR(3)
	ADD PRIMARY KEY (`id`)";
	

//Run Queries

$result0 = mysqli_query ($link, $query0) or die(mysqli_error($link));

$result = mysqli_query ($link, $query1) or die(mysqli_error($link));

$result = mysqli_query ($link, $query2) or die(mysqli_error($link));

$result = mysqli_query ($link, $query3) or die(mysqli_error($link));

$result = mysqli_query ($link, $query5) or die(mysqli_error($link));

$result = mysqli_query ($link, $query6) or die(mysqli_error($link));

$result = mysqli_query ($link, $query7) or die(mysqli_error($link));

$result = mysqli_query ($link, $query8) or die(mysqli_error($link));


//Close DB and End

mysqli_close($link);
?>
