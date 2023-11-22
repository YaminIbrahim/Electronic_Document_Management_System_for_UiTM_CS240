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
		$doc_Code = $_POST['docCode'];
		$doc_Name = $_POST['docName'];
		$doc_Mark = $_POST['docMark'];

	    //give unique name to the file as file with the same name cant be uploaded
	    $file = rand(1000,100000)."-".$_FILES['docFile']['name'];
	    $file_loc = $_FILES['docFile']['tmp_name'];
	    $file_size = $_FILES['docFile']['size'];
	    $file_type = $_FILES['docFile']['type'];
	    $folder="FormRubric/";
	 
	    /* new file size in KB */
	    $new_size = $file_size/1024;  
	 
	    /* make file name in lower case */
	    $new_file_name = strtolower($file);
	 
	    $final_file=str_replace(' ','-',$new_file_name);
	 
	    if(move_uploaded_file($file_loc,$folder.$final_file)){

	    	//INSERT INTO `doctype`(`docCode`, `docName`, `docFileName`, `docExtension`, `docSize`, `docMark`, `docDecs`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')

	    	$sql = "INSERT INTO doctype (`docCode`, `docName`, `docFileName`, `docExtension`, `docSize`, `docDecs`) VALUES ('".$doc_Code."','".$doc_Name."','".$final_file."','".$file_type."','".$new_size."','".$doc_Mark."')";

	    	mysqli_query($connection,$sql);
	  
	        echo "File sucessfully upload";

	        header('location: FormRubric.php');

	    } else {
	        echo "Error.Please try again";
	    }
	}
?>
</body>
</html>