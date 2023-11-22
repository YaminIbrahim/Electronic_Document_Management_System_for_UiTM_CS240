<?php
    //store and retrieve data across multiple pages for the same user
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adding class</title>

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
        if (isset($_POST["addClass"])) {
            
            //retrieve data from form
            $class_name = $_POST['className'];
            $class_year = $_POST['classYear'];
            $class_session = $_POST['classSession'];
            $class_lect = $_POST['lectName'];

            //INSERT INTO `class`(`classID`, `className`, `classStartYear`, `classEndYear`, `adminID`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

            //composit key creation for PK
            $class_id = $class_name.$class_year.$class_session;

            $sql = "INSERT INTO `class`(`classID`, `className`, `classYear`, `classSession`, `adminID`) VALUES ('".$class_id."','".$class_name."','".$class_year."','".$class_session."','".$class_lect."')";

            $result = mysqli_query($connection, $sql) or die(mysqli_error());

            if($result){
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=class.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"3;URL=addClass.php\"/>";
        }

    ?>
</body>
</html>