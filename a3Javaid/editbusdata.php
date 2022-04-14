<?php

//This file modifies bbustrip table data

    include 'connectdb.php';


    if(isset($_POST['change'])){ //Conifrm that the button is pressed

        //taking the inputs and storing them in variables

        $busId = $_POST['busId'];
        $tripName = $_POST['tripName'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];


        //Query
        $result = $connection->query("UPDATE `bustrips` SET `Start` = '$startDate', `End` = '$endDate',
         `TripName` = '$tripName' WHERE `bustrips`.`BusID` =  '$busId' ");



        if($result){

            //using javascript to show that query has been successful
            ?>
                    <script>
                        alert("Successfully Updated data");
                    </script>
            <?php
        }

        else{
            echo "Failed to update data";
        }


    }


?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Edit Bus data</title>
</head>
<body>

    <h1>Edit the bus data here</h1>
 
        <!--Form to take input-->
    <form action="editbusdata.php" method="post">
            <input type="text" name = "busId" placeholder="Bus id" required> <br> <! --- inputs the bus id ---> 
            <input type="text" name = "tripName" placeholder="Trip Name" required> <br> <! --- inputs the tripName id ---> 
            <input type="date" name = "startDate" placeholder="Start date" required> <br> <! --- inputs the start date ---> 
            <input type="date" name = "endDate" placeholder="end date" required> <br>


            <button name = "change" type="submit">Submit</button>

    </form>
    
</body>
</html>