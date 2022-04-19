<?php

// Mysql Connection
$link = mysqli_connect("localhost", "nzva_admin", "Chicken01", "nzva_new");

$offset = 0; //initial offset;

//FlightXML Login Details
$options = array(
                 'trace' => true,
                 'exceptions' => 0,
                 'login' => 'jamiemarshallnz',
//                 'password' => '8e91441e73518acd0087d9cbb0d1dca37c93c4e6',
                 );
$client = new SoapClient('http://flightxml.flightaware.com/soap/FlightXML2/wsdl', $options);
?>
