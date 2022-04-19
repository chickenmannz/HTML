<?PHP

include 'creds.inc';

// Get Aiport ICAO CODE Get unique origin from flights 

$query1 = "SELECT DISTINCT origin FROM flightstemp";

$result1 = mysqli_query($link, $query1) or die(mysqli_error($link));

// Pull the airport data from FlightXML for each row

while ($row = mysqli_fetch_array ($result1, MYSQLI_ASSOC)) {

	// get the airport data.
	$params = array( 'airportCode' => $row['origin']) ;

	$result2 = $client->AirportInfo ($params);

	foreach ($result2 as $data) {

		//$airportname = "$data->name";
		//$airportlocation = "$data->location";

		// $airportname = mysqli_real_escape_string($link , '$airportname');
		// $airportlocation = mysqli_real_escape_string($link , $airportlocation);
		
		//Insert the results into the database	

		//$query3 = "UPDATE locations SET lat = '$data->latitude' , location = '$airportlocation' ,
		//lon = '$data->longitude' , name = '$airportname' , timezone = '$data->timezone' , code = '$row[origin]'";

		$query3 = "INSERT INTO locations ( lat, lon, timezone, code) VALUES ('$data->latitude' , 
		'$data->longitude', '$data->timezone', '$row[origin]')";
    
	mysqli_query($link, $query3) or die(mysqli_error($link));
    
    	}

}

// Need to remove the colons : from the timezone field

$query4 = "UPDATE locations SET timezone = REPLACE(timezone, ':','') WHERE 1";

mysqli_query($link, $query4) or die(mysqli_error($link));

//Close DB and End

mysqli_close($link);

?>

