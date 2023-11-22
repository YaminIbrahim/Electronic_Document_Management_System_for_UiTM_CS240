<?php
    //store and retrieve data across multiple pages for the same user
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Creating lecturer account</title>

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
        if (isset($_POST["addLect"])) {
            
            //retrieve data from form
            $lect_id = $_POST['staffID'];
            $lect_name = $_POST['name'];
            $lect_email = $_POST['email'];

            $lect_password = substr($lect_name, 0, 2) . $lect_id;

            $lect_phoneNum = $_POST['phoneNum'];
            $lect_roomNum = $_POST['roomNum'];

            //INSERT INTO `lecturer`(`lectID`, `lectName`, `lectEmail`, `lectPassword`, `lectPhoneNum`, `lectRoomNum`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')

            $sql = "INSERT INTO lecturer(lectID, lectName, lectEmail, lectPassword, lectPhoneNum, lectRoomNum) VALUES ('".$lect_id."','".$lect_name."','".$lect_email."','".$lect_password."','".$lect_phoneNum."','".$lect_roomNum."')";

            $result = mysqli_query($connection, $sql) or die(mysqli_error());

            if($result){
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=lecturer.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"3;URL=lecturer.php\"/>";
        }

    ?>

    <?php
       if (isset($_POST['import'])) {
            $classID = $_POST['classID'];

            $fileName = $_FILES['file']['tmp_name'];

            if ($_FILES['file']['size'] > 0) {
                $file = fopen($fileName, "r");

                while (($column = fgetcsv($file, 10000, ",")) !== FALSE){
                    $lectID = $column[0];
                    $lectName = $column[1];
                    $lectEmail = $column[2];
                    $lectOEmail = $column[3];
                    $lectPhoneNum = $column[4];
                    $lectRoomNum = $column[5];

                    // Generate password using first 2 characters of name and student ID
                    $nameParts = explode(" ", $lectName);
                    $firstTwoChars = substr(strtolower($nameParts[0]), 0, 2);
                    $lectPassword = $firstTwoChars . $lectID;

                    // SQL query to insert student data with the generated password
                    $sqlInsert = "INSERT INTO lecturer(lectID, lectName, lectEmail, lectOuriginalEmail, lectPassword, lectPhoneNum, lectRoomNum) VALUES ('".$lectID."','".$lectName."','".$lectEmail."','".$lectOEmail."','".$lectPassword."','".$lectPhoneNum."','".$lectRoomNum."')";

                    $result = mysqli_query($connection, $sqlInsert);

                    if (!empty($result)) {
                        echo "CSV Data Imported";
                        echo "<meta http-equiv=\"refresh\" content=\"3;URL=lecturer.php\"/>";
                    } else {
                        echo "Import file failed!!";
                    }
               }
               fclose($file);
           }
       }
    ?>
</body>
</html>