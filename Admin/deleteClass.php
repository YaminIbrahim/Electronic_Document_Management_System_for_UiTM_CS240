<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>removing class</title>

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
        if (isset($_GET["classID"])) {
            $class_id = $_GET["classID"]; 

            //DELETE FROM `class` WHERE 0

            $sql = "DELETE FROM class WHERE classID = '" . $class_id . "'";
            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if($query){
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=class.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"3;URL=class.php\"/>";
        }
    ?>
</body>
</html>