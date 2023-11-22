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
            $admin_id = $_POST['staffID'];
            $admin_name = $_POST['name'];
            $admin_email = $_POST['email'];
            $admin_ouriginal_email = $_POST['emailOuriginal'];
            $admin_phoneNum = $_POST['phoneNum'];
            $admin_roomNum = $_POST['roomNum'];

            $admin_password = substr($admin_name, 0, 2) . $admin_id;

            //INSERT INTO `admin`(`adminID`, `adminName`, `adminEmail`, `adminOuriginalEmail`, `adminPassword`, `adminPhoneNum`, `adminRoomNum`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')

            $sql = "INSERT INTO `admin`(`adminID`, `adminName`, `adminEmail`, `adminOuriginalEmail`, `adminPassword`, `adminPhoneNum`, `adminRoomNum`) VALUES ('".$admin_id."','".$admin_name."','".$admin_email."','".$admin_ouriginal_email."','".$admin_password."','".$admin_phoneNum."','".$admin_roomNum."')";

            $result = mysqli_query($connection, $sql) or die(mysqli_error());

            if($result){
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin.php\"/>";
        }

    ?>
</body>
</html>