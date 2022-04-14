<?php

    include 'connectdb.php';

    if(isset($_POST['add'])){ //COnfirm the button has been pressed

        $busid = $_POST['busid'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $dest = $_POST['dest'];
        $name = $_POST['tripname'];
        $plate = $_POST['plate'];
        $url = $_POST['url'];

        //Query for  checking if the busid already exists
        $result = mysqli_query($connection, "SELECT busid from bustrips where BusID = '$busid' ");

        if(mysqli_num_rows($result) > 0) {


            //js to display the pop up
            ?>
                <script>
                    alert("Bus id already exists");
                </script>
            <?php

        }
        else{

            //Insert Query
            $sql = "INSERT INTO `bustrips` (`BusID`, `Start`, `End`, `CountryDestination`, `TripName`, `LicensePlateID`) 
            VALUES 
            ('$busid', '$start', '$end', '$dest', '$name', '$plate')";



            //executing the query and storing the result in the variable
            $result = mysqli_query($connection, $sql);



            if($result){
                ?>
                <script>
                    alert("Trip added successfully");
                </script>
                <?php

            }else{
                echo "Trip addition failed";
            }

        }

        

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Add trip</title>
</head>
<body>

    <h1>Add a trip by entring the following information</h1>


    <!--Form to display the inputs-->
    <form action="addtrip.php" method="post">

        <input type="text" name = "busid" placeholder="BusId" required><br>
        <input type="date" name = "start" placeholder="Start date" required><br>
        <input type="date" name = "end" placeholder="End date" required><br>
        <input type="text" name = "dest" placeholder="Country destination" required><br>
        <input type="text" name = "tripname" placeholder="Trip name" required><br>
        <input type="text" name = "plate" placeholder="Liscense Plate id" required><br>
        <input type="text" name = "url" placeholder="URL for image" ><br>

        <button name = "add" type="submit">Add Trip</button>


    </form>
    
</body>
</html>