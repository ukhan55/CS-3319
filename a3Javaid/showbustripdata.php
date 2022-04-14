<?php
    include 'connectdb.php';


    //This file display all the data from bustrips table in a perticular order
    if(isset($_POST['submitorder'])){

        $orderby_name = $_POST['sort']; //Getting the user selected option
        $orderby = $_POST['sortorder']; //Getting the Asc or desc

        //Get the values of the Radio Buttons


        //Queries on the bases of Radio Buttons values




        //If the user selcts to order it by trip name in asc order
        if($orderby_name == 'TripName'  and $orderby == 'Ascending'){
            $result = $connection->query("SELECT * FROM BusTrips order by TripName asc");
            
        }

        //If the user selcts to order it by trip name in desc order
        else if($orderby_name == 'TripName' and $orderby == 'Descending'){

            $result = $connection->query("SELECT * FROM BusTrips order by TripName desc");

        }

        //If the user selcts to order it by Country destination in asc order
        else if($orderby_name == 'CountryDestination' and $orderby == 'Ascending'){

            $result = $connection->query("SELECT * FROM BusTrips order by CountryDestination asc");


        }
        //If the user selcts to order it by Country destination in desc order

        else if($orderby_name== 'CountryDestination' and $orderby == 'Descending'){

            $result = $connection->query("SELECT * FROM BusTrips order by CountryDestination desc");

        }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Show Bus Trip Data</title>
</head>
<body>

    <?php
                //display the table

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