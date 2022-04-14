<?php

    include 'connectdb.php';

    //This will del the record from the tripsdata table

    if(isset($_POST['del'])){ ///Confirm the button has been pressed

        $busid = $_POST['busid'];// Storing the busid from input field into a valriable



        //query for checking if the trip has any bookings
        $result = $connection->query("select * from bustrips where BusID in (Select BusID FROM books) and BusID = '$busid' "); 
        //Subquery which returuns the number of booking for a particular bus id



        //Confirm that the particular bus id has bookings
        if($result->num_rows > 0){


            //js to display popup
            ?>
                    <script>
                        alert("This trip has bookings, it cant be deleted.");
                    </script>
            <?php

        }  
        
        //If the bus dont have any bookings
        else{

            //A confirmation dialog box  to confirm
            ?>
                <script>
                    confirm("You sure want to delete it?");
                </script>
            <?php

            //delete query 
            $result = $connection->query("DELETE FROM bustrips where BusID = '$busid' ");


            if($result){


                //js to display popup
                ?>
                    <script>
                        alert("Trip deleted.");
                    </script>
                <?php

            }
            else{
                echo "del failed.";
            }

        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>delete trip</title>
</head>
<body>

    <h1>Enter the bus id to delete that trip</h1>
    
    <!--From to get input the Bus id-->
    <form action="deltrip.php" method="post">

        <input name= "busid" type="text" placeholder= "Enter the busId" required> 

        <button name = "del" type="submit">delete</button>

    </form>
    
</body>
</html>