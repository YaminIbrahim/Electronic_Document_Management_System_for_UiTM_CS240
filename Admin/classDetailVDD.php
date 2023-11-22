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
	if (isset($_GET['docView'])) {

			//retrieve the info from the form
		$doc_Code = $_GET['docView'];
		$stud_id = $_GET['studID'];

			// Query to select the document from the database
		$sql = "SELECT * FROM document WHERE docID = '".$doc_Code."'";
		$query = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($query);

            // Set the appropriate header for PDF display
		header("Content-type: application/pdf");

            // Get the absolute path to the PDF file
		$pdfFilePath = $_SERVER['DOCUMENT_ROOT'] . "/Edms/Form_rubric/" . $row['docName'];

            // Read the file and output it to the browser
		readfile($pdfFilePath);
            exit; // Important to exit after reading the file
        }

		//download document module
        if (isset($_GET['docDw'])) {

            // Retrieve the info from the form
        	$doc_Code = $_GET['docDw'];
        	$stud_id = $_GET['studID'];

            // Query to select the document from the database
        	$sql = "SELECT * FROM document WHERE docID = '".$doc_Code."'";
        	$query = mysqli_query($connection, $sql);
        	$row = mysqli_fetch_array($query);

            // Set the appropriate header for download
        	header("Content-Type: application/octet-stream");
        	header("Content-Disposition: attachment; filename=" . urlencode($row['docName']));
        	header("Content-Description: File Transfer");
        	header("Content-Length: " . filesize($_SERVER['DOCUMENT_ROOT'] . "/Edms/Form_rubric/" . $row['docName']));

            // Read the file and output it to the browser
        	ob_clean();
        	flush();
        	readfile($_SERVER['DOCUMENT_ROOT'] . "/Edms/Form_rubric/" . $row['docName']);
            exit; // Important to exit after reading the file
        } 

		//delete document module
        if (isset($_GET["docRemove"])) {
        	$doc_code = $_GET["docRemove"]; 
        	$stud_id = $_GET['studID'];

        	$sql = "DELETE FROM document WHERE docID = '" . $doc_code . "'";
        	$query = mysqli_query($connection, $sql) or die(mysqli_error());

        	if($query){
        		header("location: classDetailLecturer.php?studID=" . urlencode($stud_id));
        		exit;
        	} else {
        		die(mysqli_error());
        	}
        } else {
        	header("location: classDetailLecturer.php?studID=" . urlencode($stud_id));
        	exit;
        }
        ?>
    </body>
    </html>