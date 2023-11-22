<?php
    //store and retrieve data across multiple pages for the same user
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>adding document</title>

    <!-- favicon -->
    <link rel="website icon" type="png" href="images/favicon.png">

    <!-- import database connection file -->
    <?php 
        include("../Dbconn.php"); 
    ?>

    <link rel="stylesheet" type="text/css" href="../Loader.css">
</head>

<body>

    <div class="loadBox">
        <div class="loader loader_bubble"></div>
    </div>

    <?php 
        $stud_id = $_GET['studID'];

        $sql = "UPDATE `student` SET `studSV`='".$_SESSION['lect_id']."'WHERE studID = '".$stud_id."'";
     ?>
</body>
</html>