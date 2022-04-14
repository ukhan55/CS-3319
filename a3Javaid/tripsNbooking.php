<?php

//It will display the data of bustrips which dont have any bookings

    include 'connectdb.php';

    $result = $connection->query("select * from BusTrips where BusID not in (Select BusID from Books)");
    //Sub query to getting the bookings



?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Trips that dont have any bookings</title>
</head>
<body>

    <h1>Trips that dont have any bookings</h1>

    <?php
            // display the data from bustrips table
            echo "<table border='1'>
            <tr>
            <th>BusID</th>
            <th>CountryDestination</th>
            <th>TripName</th>
            <th>LicensePlateID</th>
            <th>Start</th>
            <th>End</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['BusID'] . "</td>";
            echo "<td>" . $row['CountryDestination'] . "</td>";
            echo "<td>" . $row['TripName'] . "</td>";
            echo "<td>" . $row['LicensePlateID'] . "</td>";
            echo "<td>" . $row['Start'] . "</td>";
            echo "<td>" . $row['End'] . "</td>";
            echo "</tr>";
            }
            echo "</table>";


    ?>

    
</body>
</html>