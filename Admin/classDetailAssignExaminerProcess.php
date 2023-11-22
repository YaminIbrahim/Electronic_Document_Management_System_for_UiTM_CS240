<?php
    //store and retrieve data across multiple pages for the same user
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Saving</title>

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
        if (isset($_POST["assignExaminer"])) {
            
            //retrieve data from form
            $lect_id = $_POST['assign'];
            $stud_id = $_POST['studID'];
            $class_id = $_POST['classID'];

            //echo "stud".$stud_id." "."lect".$lect_id;

            //UPDATE `student` SET `studID`='[value-1]',`studFName`='[value-2]',`studLName`='[value-3]',`studEmail`='[value-4]',`studPassword`='[value-5]',`studPhoneNum`='[value-6]',`studSV`='[value-7]',`studExam`='[value-8]',`classID`='[value-9]' WHERE 1

            $sql = "UPDATE student SET studExam = '".$lect_id."' WHERE studID = '".$stud_id."'";

            $result = mysqli_query($connection, $sql) or die(mysqli_error());

            if($result){
                header("location: classDetail.php?classID=" . urlencode($class_id));
            } else {
                die(mysqli_error());
            }
        } else {
            header("location: classDetail.php?classID=" . urlencode($class_id));
        }
    ?>
</body>
</html>