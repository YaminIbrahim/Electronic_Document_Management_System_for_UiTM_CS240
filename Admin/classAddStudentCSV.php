<?php
    //store and retrieve data across multiple pages for the same user
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Creating student account</title>

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
       if (isset($_POST['import'])) {
            $classID = $_POST['classID'];

            $fileName = $_FILES['file']['tmp_name'];

            if ($_FILES['file']['size'] > 0) {
                $file = fopen($fileName, "r");

                while (($column = fgetcsv($file, 10000, ",")) !== FALSE){
                    $studID = $column[0];
                    $studName = $column[1];
                    $studEmail = $column[2];
                    $studPhoneNum = $column[3];

                    // Generate password using first 2 characters of name and student ID
                    $nameParts = explode(" ", $studName);
                    $firstTwoChars = substr(strtolower($nameParts[0]), 0, 2);
                    $studPassword = $firstTwoChars . $studID;

                    // SQL query to insert student data with the generated password
                    $sqlInsert = "INSERT INTO `student`(`studID`, `studName`, `studEmail`, `studPassword`, `studPhoneNum`, `classID`) VALUES ('".$studID."','".$studName."','".$studEmail."','".$studPassword."','".$studPhoneNum."','".$classID."')";

                    $result = mysqli_query($connection, $sqlInsert);

                    if (!empty($result)) {
                        echo "CSV Data Imported";
                        header("location: classDetail.php?classID=" . urlencode($classID));
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