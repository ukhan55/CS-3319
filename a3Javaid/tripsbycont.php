<?php

    //It will display bustrips for a particular country

    include 'connectdb.php';

    if(isset($_POST['search'])){ //Button Confirmation

        $country = $_POST['country']; //Storing the country in the variable


        //Search Query
        $result = $connection->query("SELECT * from bustrips where CountryDestination like '%$country%' ");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Trips by country name</title>
</head>
<body>

    <h1>Search for a country by Name</h1>

    <!--Form to display results-->

    <form action="tripsbycont.php" method="post">
        <input type="text" name = "country" placeholder="country name " required>

        <button name = "search" type="submit">Proceed</button>
    </form>



    <?php


    //display information about bustrips which are matching with the particular country
    if(isset($_POST['search'])){

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

    }

?>
    
</body>
</html>