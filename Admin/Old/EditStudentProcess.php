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
        if (isset($_POST["editStud"])) {
            $stud_id = $_POST["studID"]; 
            $stud_fname = $_POST["firstName"];
            $stud_lname = $_POST["lastName"];
            $stud_email = $_POST["email"];
            $stud_address = $_POST["address"];
            $stud_phonenum = $_POST["phoneNum"];
            $room_number = $_POST["roomNum"];
            $stud_checkin = $_POST["checkIn"];


            /*$sql = "UPDATE student 
                    SET STUD_FNAME = '" . $stud_fname . "',STUD_LNAME = '" . $stud_lname . "',STUD_EMAIL = '" . $stud_email . "',STUD_ADDRESS = '" . $stud_address . "',STUD_PHONENUM = '". $stud_phonenum . "',ROOM_NUMBER = '" . $room_number . "',STUD_CHECKIN = '" . $stud_checkin . "' WHERE STUD_ID = '". $stud_id . "'";*/

            /*$sql = "UPDATE student
                    SET student.studFname = '" .$stud_fname. "',student.studLname = '" .$stud_lname. "',student.studEmail = '" .$stud_email. "',student.studAddr = '" .$stud_address. "',student.studPhoneNum = '" .$stud_phonenum. "',room.roomID = '" .$room_number. "',register.regisDate = '" .$stud_checkin. "'
                    FROM student
                    JOIN register ON student.studID = register.studID
                    JOIN room ON register.roomID = room.roomID
                    WHERE student.studID = '" .$stud_id. "'";*/

            $sql = "UPDATE student 
                    SET studFname = '" . $stud_fname . "',studLname = '" . $stud_lname . "',studEmail = '" . $stud_email . "',studAddr = '" . $stud_address . "',studPhoneNum = '". $stud_phonenum . "'
                    WHERE studID = '". $stud_id . "'";

            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            $sql = "UPDATE register
                    SET roomID = '" .$room_number. "'
                    WHERE studID = '" .$stud_id. "'";

            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if ($query) {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=Student.php\"/>";
            } else{
                die(mysqli_error());
            }     
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=Student.php\"/>";
        }
    ?>
</body>
</html>