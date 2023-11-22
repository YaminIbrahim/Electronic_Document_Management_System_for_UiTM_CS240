<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Edit Student Process</title>

    <!-- import database connection file -->
    <?php 
        include("../Dbconn.php"); 
    ?>

    <link rel="stylesheet" type="text/css" href="/Melati HRS/Loader.css">
</head>
<body>
    <div class="loadBox">
        <div class="loader loader_bubble"></div>
    </div>

    <?php
        if (isset($_POST["editRoom"])) {
            $room_id = $_POST["room_number"]; 
            $room_avail = $_POST["room_avai"];
            $room_block = $_POST["room_block"];
            $room_floor = $_POST["room_floor"];
            $room_type = $_POST["room"];


            $sql = "UPDATE ROOM 
                    SET roomAvail = '" .$room_avail. "',roomBlock = '" .$room_block. "',roomFloor = '" .$room_floor. "',roomType = '" .$room_type. "' WHERE roomID = '".$room_id."'" ;

            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if ($query) {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=Room.php\"/>";
            } else{
                die(mysqli_error());
            }     
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=Room.php\"/>";
        }
    ?>
</body>
</html>