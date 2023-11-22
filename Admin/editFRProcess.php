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

	if(isset($_POST['editDoc'])){  

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

	    echo $file;

	    if ($file_size == "") {
	    	if(move_uploaded_file($file_loc,$folder.$final_file)){

		    	//UPDATE `doctype` SET `docCode`='[value-1]',`docName`='[value-2]',`docFileName`='[value-3]',`docExtension`='[value-4]',`docSize`='[value-5]',`docMark`='[value-6]',`docDecs`='[value-7]' WHERE 1

		    	$sql = "UPDATE `doctype` SET `docName`='".$doc_Name."',`docDecs`='".$doc_Mark."' WHERE docCode = '".$doc_Code."'";

		    	mysqli_query($connection,$sql);
		  
		        echo "File sucessfully updated";

		        header('location: FormRubric.php');

		    } else {
		        echo "Error no file. Please try again";
		    }

	    } else {
	    	if(move_uploaded_file($file_loc,$folder.$final_file)){

		    	//UPDATE `doctype` SET `docCode`='[value-1]',`docName`='[value-2]',`docFileName`='[value-3]',`docExtension`='[value-4]',`docSize`='[value-5]',`docMark`='[value-6]',`docDecs`='[value-7]' WHERE 1

		    	$sql = "UPDATE doctype SET docName='".$doc_Name."',docFileName='".$final_file."',docExtension='".$file_type."',docSize='".$new_size."',docDecs='".$doc_Mark."' WHERE docCode = '".$doc_Code."'";

		    	mysqli_query($connection,$sql);
		  
		        echo "File sucessfully updated";

		        header('location: FormRubric.php');

		    } else {
		        echo "Error file attach.Please try again";
		    }
	    }
	}
?>
</body>
</html>