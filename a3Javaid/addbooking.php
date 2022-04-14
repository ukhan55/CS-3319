<?php

    //Add a new record to the booking table

    include 'connectdb.php';

    if(isset($_POST['add_booking'])){ //Button confirmation

        $busid = $_POST['busid'];
        $pid = $_POST['pid'];
        $price = $_POST['price'];

        //variables to store data from the input fields



        //Query for  checking if the busid already exists
        $result1 = mysqli_query($connection, "select * from bustrips where BusID in (Select BusID FROM bustrips) and BusID = '$busid'");


        //Query for  checking if the passenger id already exists
        $result2 = mysqli_query($connection, "SELECT PassengerID from passenger where PassengerID in 
        (Select PassengerID FROM passenger) and PassengerID = '$pid' ");


        
        //id both queries retun rows
        if((mysqli_num_rows($result1) > 0) and (mysqli_num_rows($result1) > 0) ) {

            //Insert Query
            $sql = "INSERT INTO `books` (`PassengerID`, `BusID`, `Price`) 
            VALUES 
            ('$pid', '$busid', '$price' )";


            $result = mysqli_query($connection, $sql);

            if($result){
                ?>
                <script>
                    alert("Booking added successfully");
                </script>
                <?php

            }else{
                echo "Booking addition failed";
                echo $connection->error;
            }

            
        }
        else{

            //js to display popup
            ?>
                <script>
                    alert("Bus id and passenger id should exists");
                </script>
            <?php


        }

        

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Add Booking</title>
</head>
<body>

    <h1>Add a trip by entring the following information</h1>

    <!--Form to display the inputs-->
    <form action="addbooking.php" method="post">

        <input type="text" name = "busid" placeholder="BusId" required><br>
        <input type="text" name = "pid" placeholder="Passenger Id" required><br>
        <input type="text" name = "price" placeholder="Price" required><br>
        

        <button name = "add_booking" type="submit">Add Booking</button>


    </form>
    
</body>
</html>