<?php
    //it will delete a record from the bookings table
    include 'connectdb.php';

    if(isset($_POST['del_booking'])){ //Button confirmation

        $busid = $_POST['busid'];
        $pid = $_POST['pid'];

        //Storing the bus id and the passenger id teh variables

        
            //delete query 
            $result = $connection->query("DELETE FROM books where BusID = '$busid' and PassengerID = '$pid' ");

            
            //A confirmation dialog box  to confirm
            ?>
                <script>
                    confirm("You sure want to delete it?");
                </script>
            <?php

            if($result){

                ?>
                    <script>
                        alert("Booking deleted.");
                    </script>
                <?php

            }
            else{
                echo "del failed.";
                echo $connection->error;
            }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>delete booking</title>
</head>
<body>

    <h1>Enter the bus id and passenger id  to delete that booking</h1>

    <!--Form to take inputs-->
    <form action="delbook.php" method="post">

        <input name= "busid" type="text" placeholder= "Enter the busId" required>
        <input name= "pid" type="text" placeholder= "Enter the passenger id" required>

        <button name = "del_booking" type="submit">delete</button>

    </form>
    
</body>
</html>