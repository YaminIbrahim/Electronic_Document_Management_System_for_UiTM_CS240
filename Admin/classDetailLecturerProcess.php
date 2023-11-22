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

	if(isset($_POST['uploadDoc'])){  

		//retrieve data from form
		$stud_id = $_POST['studID'];
		$doc_id = $_POST['docType'];
		$doc_uploadBy = $_POST['uploadBy'];

		$sql = "SELECT * FROM doctype WHERE docCode = '".$doc_id."'";
		$query = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($query);

		$doc_name = $row['docName'];
		
	    //give unique name to the file as file with the same name cant be uploaded
	    $file = rand(1000,100000)."-".$_FILES['docFile']['name'];
	    $file_loc = $_FILES['docFile']['tmp_name'];
	    $file_size = $_FILES['docFile']['size'];
	    $file_type = $_FILES['docFile']['type'];
	    $folder="../Form_rubric/";
	 
	    $new_size = $file_size/1024;  

	    $new_file_name = strtolower($file);
	 
	    $final_file=str_replace(' ','-',$new_file_name);

	    echo $stud_id . $doc_id . $doc_name . $doc_uploadBy; 

	 	
	    if(move_uploaded_file($file_loc,$folder.$final_file)){

	    	//INSERT INTO `document`(`docName`, `docExtension`, `docSize`, `docMark`, `uploadBy`, `docCode`, `studID`, `adminID`, `lectID`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')

	    	$sql = "INSERT INTO `document`(`docName`, `docExtension`, `docSize`, `uploadBy`, `docCode`, `studID`, `adminID`) VALUES ('".$final_file."','".$file_type."','".$file_size."','".$doc_uploadBy."','".$doc_id."','".$stud_id."','".$_SESSION['admin_id']."')";

	    	mysqli_query($connection,$sql);
	  
	        echo "File sucessfully upload";

	        header("location: classDetailLecturer.php?studID=".urlencode($stud_id));
	        exit();

	    } else {
	        echo "Error.Please try again";
	    }
	}
?>
</body>
</html>