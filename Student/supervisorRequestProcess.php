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
	

	if(isset($_POST['submit'])){  
		$stud_id = $_POST['studID'];
	$sv = $_POST['sv'];
	$fyptitle = $_POST['fyptitle'];

	$req = $sv.'1';

		
		$sql = "UPDATE `student` SET `studFYPTitle`='".$fyptitle."',`studSV`='".$req."' WHERE studID = '".$stud_id."'";
		$execute = mysqli_query($connection, $sql);
		
		echo "File sucessfully upload";

	        header("location: supervisor.php?studID=" . urlencode($stud_id));
	        exit();

	    } else {
	        echo "Error.Please try again";
	    }

	
?>
</body>
</html>