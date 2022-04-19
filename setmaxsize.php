<?php


//Credentials with XML2 API Key
$options = array(
                 'trace' => true,
                 'exceptions' => 0,
                 'login' => 'jamiemarshallnz',
                 'password' => '8e91441e73518acd0087d9cbb0d1dca37c93c4e6',
                 );
$client = new SoapClient('http://flightxml.flightaware.com/soap/FlightXML2/wsdl', $options);

	$params = array(
		"max_size" => "500");

	$result = $client->SetMaximumResultSize($params);
print_r($result);

?>
