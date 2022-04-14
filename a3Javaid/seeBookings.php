<?php

//It display all the booking for a particular passenger

    include 'connectdb.php';

    if(isset($_POST['see'])){ ///Button confirmation

        $pid = $_POST['pid'];
        //Stroring the passenger id in the variable from the input fild

        $result = $connection->query("SELECT * from books where PassengerID = '$pid' ");

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>See bookings of a Passenger</title>
</head>
<body>

    <h1>See bookings of a passenger</h1>
    <form action="seeBookings.php">
        <input name = "pid" type="text " placeholder="Enter the passenger id" required>

        <button name = "see" type="submit">Submit</button>
    </form>

    <?php
                //display all the data form the bookings table
               if(isset($_POST['see'])){

                    echo "<table border='1'>
                    <tr>
                    <th>Passenger ID</th>
                    <th>Bus id</th>
                    <th>Price</th>
                    
                    </tr>";

                    while($row = mysqli_fetch_assoc($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['PassengerID'] . "</td>";
                    echo "<td>" . $row['BusID'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";

                }


    ?>
    
    
</body>
</html>