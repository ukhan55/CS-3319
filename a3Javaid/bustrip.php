<?php
        include 'connectdb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

        <title>Bus Trips</title>
</head>
<body>
        <h1>Welcome to Bus Trips</h1>
        <h2>Our Bus Trips</h2>

        <?php
                include 'bustripdata.php';
        ?>

        <h2>Order by TripName or CountryDestination?</h2>

        <form action="showbustripdata.php" method="post">

                <input type="radio" name="sort" value ="TripName">Trip Name<br>
                <input type="radio" name="sort" value ="CountryDestination">Country Destination<br>

                <h3>Choose either method of ordering the data:</h3>

                <input type="radio" name="sortorder" value ="Ascending">Ascending<br>
                <input type="radio" name="sortorder" value ="Descending">Descending<br>
                
                <input type="submit" name="submitorder" value ="Submit order">
        </form>

        <a href="editbusdata.php">Modify Trip data</a><br>
        <a href="deltrip.php">delete trip</a><br>
        <a href="addtrip.php">add trip</a> <br>
        
        <a href="tripsbycont.php">See trips by country name</a><br>
        <a href="addbooking.php">Add booking</a><br>
        <a href="pinfo.php">Info about Passengers</a><br>
        <a href="seeBookings.php">See bookings of a Passenger</a><br>
        <a href="delbook.php">delete a booking</a><br>
        <a href="tripsNbooking.php">See bus trips that don't have any bookings</a><br>
</body>
</html>
