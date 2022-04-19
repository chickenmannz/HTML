<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flights Database Results</title>
  </style>
</head>
<body>

<?php

include 'creds.inc';

// DUPLICATE FLIGHTS

$query1 = "SELECT f.flight_number, f.dep_icao, f.arr_icao, o.dep_icao, o.arr_icao 
	FROM flights AS f INNER JOIN oldflights as o ON f.flight_number = o.flight_number 
	WHERE o.dep_icao <> f.dep_icao OR o.arr_icao <> f.arr_icao ORDER BY f.flight_number ASC";

$result1 = mysqli_query($link, $query1) or die(mysqli_error($link));

$num_rows1 = mysqli_num_rows($result1);

echo "<p><H2> Duplicate Flights</H2></p><br>";
echo "$num_rows1 Flights Returned\n";
echo "<table border='1'>
<tr>
<th> Flight </th>
<th> New Origin </th>
<th> New Dest </th>
<th> Old Origin </th>
<th> Old Dest </th>
</tr>";


while ($row1 = mysqli_fetch_array($result1))
{
        echo "<tr>";
        echo "<td>" . $row1[0] . "</td>";
        echo "<td>" . $row1[1] . "</td>";
        echo "<td>" . $row1[2] . "</td>";
        echo "<td>" . $row1[3] . "</td>";
        echo "<td>" . $row1[4] . "</td>";
	echo "</tr>";
}

echo "</table><br>";

// NEW FLIGHTS

$query2 = "SELECT f.*
        FROM flights AS f LEFT JOIN oldflights as o ON f.flight_number = o.flight_number
        WHERE o.flight_number IS NULL ORDER BY f.dep_icao ASC, f.arr_icao ASC, f.dep_time ASC";

$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
$num_rows2 = mysqli_num_rows($result2);

echo "<p><H2> New Flights</H2></p><br>";
echo "$num_rows2 Flights Returned\n";
echo "<table border='1'>
<tr>
<th> Flight </th>
<th> New Origin </th>
<th> New Dest </th>
<th> Dep Time </th>
<th> Arr Time </th>
<th> Duration </th>
<th> Aircraft </th>
<th> Mon </th>
<th> Tue </th>
<th> Wed </th>
<th> Thu </th>
<th> Fri </th>
<th> Sat </th>
<th> Sun </th>
</tr>";


while ($row2 = mysqli_fetch_array($result2))
{
        echo "<tr>";
        echo "<td>" . $row2[1] . "</td>";
        echo "<td>" . $row2[2] . "</td>";
        echo "<td>" . $row2[3] . "</td>";
        echo "<td>" . $row2[4] . "</td>";
        echo "<td>" . $row2[5] . "</td>";
        echo "<td>" . $row2[6] . "</td>";
        echo "<td>" . $row2[7] . "</td>";
        echo "<td>" . $row2[8] . "</td>";
        echo "<td>" . $row2[9] . "</td>";
        echo "<td>" . $row2[10] . "</td>";
        echo "<td>" . $row2[11] . "</td>";
        echo "<td>" . $row2[12] . "</td>";
        echo "<td>" . $row2[13] . "</td>";
        echo "<td>" . $row2[14] . "</td>";
        echo "</tr>";
}

echo "</table><br>";

// DELETED FLIGHTS

$query3 = "SELECT o.*
        FROM flights AS f RIGHT JOIN oldflights as o ON f.flight_number = o.flight_number
        WHERE f.flight_number IS NULL ORDER BY o.dep_icao ASC, o.arr_icao ASC, o.dep_time ASC";

$result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
$num_rows3 = mysqli_num_rows($result3);

echo "<p><H2> Deleted Flights</H2></p><br>";
echo "$num_rows3 Flights Returned\n";
echo "<table border='1'>
<tr>
<th> Flight </th>
<th> New Origin </th>
<th> New Dest </th>
<th> Dep Time </th>
<th> Arr Time </th>
<th> Duration </th>
<th> Aircraft </th>
<th> Mon </th>
<th> Tue </th>
<th> Wed </th>
<th> Thu </th>
<th> Fri </th>
<th> Sat </th>
<th> Sun </th>
</tr>";


while ($row3 = mysqli_fetch_array($result3))
{
        echo "<tr>";
        echo "<td>" . $row3[1] . "</td>";
        echo "<td>" . $row3[2] . "</td>";
        echo "<td>" . $row3[3] . "</td>";
        echo "<td>" . $row3[4] . "</td>";
        echo "<td>" . $row3[5] . "</td>";
        echo "<td>" . $row3[6] . "</td>";
        echo "<td>" . $row3[7] . "</td>";
        echo "<td>" . $row3[8] . "</td>";
        echo "<td>" . $row3[9] . "</td>";
        echo "<td>" . $row3[10] . "</td>";
        echo "<td>" . $row3[11] . "</td>";
        echo "<td>" . $row3[12] . "</td>";
        echo "<td>" . $row3[13] . "</td>";
        echo "<td>" . $row3[14] . "</td>";
        echo "</tr>";
}

echo "</table><br>";

//Close DB and End

mysqli_close($link);

?>
</body>
</html>
