<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Register Process</title>

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
        if (isset($_POST["registerStud"])) {
            $stud_id = $_POST["studID"]; 
            $stud_fname = $_POST["firstName"];
            $stud_lname = $_POST["lastName"];
            $stud_email = $_POST["email"];
            $stud_address = $_POST["address"];
            $stud_phonenum = $_POST["phoneNum"];
            $room_number = $_POST["roomNum"];
            $stud_checkin = $_POST["checkIn"];
            //$room_type =$_POST["room"];

            /*$sql = "INSERT INTO STUDENT (STUD_ID, STUD_FNAME, STUD_LNAME, STUD_EMAIL, STUD_ADDRESS, STUD_PHONENUM, ROOM_NUMBER, STUD_CHECKIN, ROOM_TYPE)
                    VALUES ('" .$stud_id. "','" .$stud_fname. "','" .$stud_lname. "','" .$stud_email. "','" .$stud_address. "','" .$stud_phonenum. "','" .$room_number. "','" .$stud_checkin. "','" .$room_type. "')";
            
            $result = mysqli_query($connection, $sql) or die(mysqli_error());*/

            $sql = "INSERT INTO student (studID, studFname, studLname, studEmail, studAddr, studPhoneNum)
                    VALUES ('" .$stud_id. "','" .$stud_fname. "','" .$stud_lname. "','" .$stud_email. "','" .$stud_address. "','" .$stud_phonenum. "')";

            $result = mysqli_query($connection, $sql) or die(mysqli_error());

            $sql = "INSERT INTO register (regisDate, staffID, studID, roomID)
                    VALUES ('" .$stud_checkin. "','" .$_SESSION["staff_id"]. "','" .$stud_id. "','" .$room_number. "')";

            $result = mysqli_query($connection, $sql) or die(mysqli_error());

            if($result){
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=Student.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=Student.php\"/>";
        }
    ?>
</body>
</html>