<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>PDF</title>

	<!-- import database connection file -->
    <?php 
        include("../Dbconn.php"); 
    ?>
</head>

<body>
	<?php

		//view document module
		if (isset($_GET['docCode'])) {

			//retrieve the info from the form
			$doc_Code = $_GET['docCode'];

			//query to select all document from database
            $sql = "SELECT * FROM doctype WHERE docCode = '".$doc_Code."'";
            $query = mysqli_query($connection, $sql);
            $row= mysqli_fetch_array($query);

			header("content-type: application/pdf");
			readfile("../Admin/FormRubric/".$row['docFileName']);
		}

		//download document module
		if (isset($_GET['docDw'])) {

            header("Content-Type: application/octet-stream");
  
			$file = $_GET["docDw"].".pdf";

			//retrieve the info from the form
			$doc_Code = $_GET['docDw'];

			//query to select all document from database
            $sql = "SELECT * FROM doctype WHERE docCode = '".$doc_Code."'";
            $query = mysqli_query($connection, $sql);
            $row= mysqli_fetch_array($query);
			  
			header("Content-Disposition: attachment; filename=" . urlencode($file));   
			header("Content-Type: application/download");
			header("Content-Description: File Transfer");            
			header("Content-Length: " . filesize($file));
			  
			flush();
			  
			$fp = fopen($file, "r");
			while (!feof($fp)) {
			    echo fread($fp, 65536);
			    flush(); // This is essential for large downloads
			} 
			  
			fclose($fp); 
		} 

		//delete document module
		
	?>
</body>
</html>