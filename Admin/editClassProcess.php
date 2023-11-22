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

	if(isset($_POST['editClass'])){  

		//retrieve data from form
		$class_id = $_POST['classID'];
		$class_name = $_POST['className'];
		$class_year = $_POST['classYear'];
		$class_session = $_POST['classSession'];
		$lect_name = $_POST['lectName'];

		//UPDATE `class` SET `classID`='[value-1]',`className`='[value-2]',`classStartYear`='[value-3]',`classEndYear`='[value-4]',`adminID`='[value-5]' WHERE 1

		$class_newID = $class_name.$class_year.$class_session;

		$sql = "UPDATE class SET `classID`='".$class_newID."',`className`='".$class_name."',`classYear`='".$class_year."',`classSession`='".$class_session."',`adminID`='".$lect_name."' WHERE classID = '".$class_id."'";
	 
	 	$query = mysqli_query($connection, $sql) or die(mysqli_error());

	 	if ($query) {
            echo "<meta http-equiv=\"refresh\" content=\"3;URL=class.php\"/>";
        } else{
            die(mysqli_error());
        } 
	} else {
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=class.php\"/>";
    }
?>
</body>
</html>