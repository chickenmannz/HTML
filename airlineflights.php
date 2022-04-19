<?php

include 'creds.inc';

//Start and end times in UTC Unix Timestamp
$startdate = 1554768000; //00:00:00 9 April 2019
$enddate = 1555372799; //23:59:59 15 April 2019

do {

	// get the airline data RLK = Air Nelson, ANZ = AirNZ, NZ3 = Mt Cook.
	$params = array(
		"startDate" => "$startdate" , 
		"endDate" => "$enddate" , 
		"origin" => "" ,
		"destination" => "" ,
		"airline" => "ANZ" ,
		"flightno" => "" ,
		"howMany" => "500" ,
		"offset" => "$offset");

	$result = $client->AirlineFlightSchedules($params);

	$nextpage = ($result->AirlineFlightSchedulesResult->next_offset);

	foreach ($result->AirlineFlightSchedulesResult->data as $key => $data) {

		//Insert the results into the database	
		$sql = "INSERT INTO AirlineFlightSchedules(actual_ident, aircrafttype, arrivaltime, departuretime, destination, ident, meal_service, origin, seats_cabin_business, seats_cabin_coach, seats_cabin_first) VALUES ('$data->actual_ident', '$data->aircrafttype', '$data->arrivaltime', '$data->departuretime', '$data->destination', '$data->ident', '$data->meal_service', '$data->origin', '$data->seats_cabin_business', '$data->seats_cabin_coach', '$data->seats_cabin_first')";

		mysqli_query($link, $sql) or die(mysqli_error($link));

	}

	$offset += 500;

} while ($nextpage >= 0);

do {

	// get the airline data RLK = Air Nelson, ANZ = AirNZ, NZ3 = Mt Cook.
	$params = array(
		"startDate" => "$startdate" , 
		"endDate" => "$enddate" , 
		"origin" => "" ,
		"destination" => "" ,
		"airline" => "RLK" ,
		"flightno" => "" ,
		"howMany" => "500" ,
		"offset" => "$offset");

	$result = $client->AirlineFlightSchedules($params);

	$nextpage = ($result->AirlineFlightSchedulesResult->next_offset);

	foreach ($result->AirlineFlightSchedulesResult->data as $key => $data) {

		//Insert the results into the database	

		mysqli_query($link, $sql) or die(mysqli_error($link));

	}

	$offset += 500;

} while ($nextpage >= 0);

do {

	// get the airline data RLK = Air Nelson, ANZ = AirNZ, NZ3 = Mt Cook.
	$params = array(
		"startDate" => "$startdate" , 
		"endDate" => "$enddate" , 
		"origin" => "" ,
		"destination" => "" ,
		"airline" => "NZ3" ,
		"flightno" => "" ,
		"howMany" => "500" ,
		"offset" => "$offset");

	$result = $client->AirlineFlightSchedules($params);

	$nextpage = ($result->AirlineFlightSchedulesResult->next_offset);

	foreach ($result->AirlineFlightSchedulesResult->data as $key => $data) {

		//Insert the results into the database	

		mysqli_query($link, $sql) or die(mysqli_error($link));

	}

	$offset += 500;

} while ($nextpage >= 0);

//Close DB and End

mysqli_close($link);

?>
