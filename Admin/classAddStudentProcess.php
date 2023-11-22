<?php
    //store and retrieve data across multiple pages for the same user
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Creating admin account</title>

    <!--favicon icon-->
    <link rel="website icon" type="png" href="/Edms/images/favicon.png">

    <!--Link CSS file-->
    <link rel="stylesheet" type="text/css" href="../Loader.css">

    <!--bootstrap boxicon for icon-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!--bootstrap fontawesome for icon-->
    <script src="https://kit.fontawesome.com/2fcc26b571.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- import database connection file -->
    <?php 
        include("../Dbconn.php"); 
    ?>
</head>

<body>
    <div class="loadBox">
        <div class="loader loader_bubble"></div>
    </div>

    <?php
        if (isset($_POST["addAdmin"])) {
            
            //retrieve data from form
            $stud_id = $_POST['studID'];
            $stud_name = $_POST['name'];
            $stud_email = $_POST['email'];
            $stud_phoneNum = $_POST['phoneNum'];
            $stud_class_id = $_POST['classID'];

            $stud_password = substr($stud_name, 0, 2) . $stud_id;

            //INSERT INTO `student`(`studID`, `studName`, `studEmail`, `studPassword`, `studPhoneNum`, `studFYPTitle`, `studSV`, `studExam`, `classID`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')

            $sql = "INSERT INTO `student`(`studID`, `studName`, `studEmail`, `studPassword`, `studPhoneNum`, `classID`)
                    VALUES ('".$stud_id."','".$stud_name."','".$stud_email."','".$stud_password."','".$stud_phoneNum."','".$stud_class_id."')";

            $result = mysqli_query($connection, $sql) or die(mysqli_error());

            if($result){
                header("location: classDetail.php?classID=" . urlencode($stud_class_id));
            } else {
                die(mysqli_error());
            }
        } else {
            header("location: classDetail.php?classID=" . urlencode($stud_class_id));
        }

    ?>
</body>
</html>