<?php

//It will the display all the info from the bustrip table passport table

    include 'connectdb.php';

    $sql = "SELECT PassengerID, FirstName, LastName, passport.PassportID, passport.Expiry
    , passport.Birth, passport.Country from Passenger join 
    Passport on Passenger.PassportID = passport.PassportID order by LastName";


    $result = mysqli_query($connection,$sql);

    if(!$result){
        echo $connection->error;
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Passenger Info</title>
</head>
<body>  

    <h1>Information about Passenger and Passport</h1> 

        <?php

        //diplay all the info

                    echo "<table border='1'>
                    <tr>
                    <th>Passenger ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Passport id</th>
                    <th>Expiry</th>
                    <th>Birth</th>
                    <th>Country</th>
                    </tr>";

                    while($row = mysqli_fetch_assoc($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['PassengerID'] . "</td>";
                    echo "<td>" . $row['FirstName'] . "</td>";
                    echo "<td>" . $row['LastName'] . "</td>";
                    echo "<td>" . $row['PassportID'] . "</td>";
                    echo "<td>" . $row['Expiry'] . "</td>";
                    echo "<td>" . $row['Birth'] . "</td>";
                    echo "<td>" . $row['Country'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";


        ?>
    
</body>
</html>