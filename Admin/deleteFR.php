<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>removing document</title>

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
        if (isset($_GET["docID"])) {
            $doc_code = $_GET["docID"]; 

            $sql = "DELETE FROM doctype WHERE docCode = '" . $doc_code . "'";
            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if($query){
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=FormRubric.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"3;URL=FormRubric.php\"/>";
        }
    ?>
</body>
</html>