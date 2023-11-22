<?php
	//using session to track user information
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registering</title>

	<!-- favicon -->
	<link rel="website icon" type="png" href="images/favicon.png">

	<!-- import database connection file -->
	<?php 
		include("Dbconn.php"); 
	?>

	<link rel="stylesheet" type="text/css" href="Loader.css">
</head>

<body>
	<div class="loadBox">
		<div class="loader loader_bubble"></div>
	</div>

	<?php
		//recall from login.php form
		$uitmid = $_POST["txtId"];
		$fname = $_POST["txtFname"];
		$lname = $_POST["txtLname"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPass"];
		$type = $_POST["typeStatus"];

		//$query = "";

		if ($type == "student") {
			//Register process for student

			//query to retrieve all the data in student table
			$query = "SELECT * FROM student WHERE studID = '" . $uitmid . "'";

			//execute query in each row of the student table
			$result = mysqli_query($connection, $query);
			$checkRow = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);

			//if uitm id already exist
			if ($row["studID"] == $uitmid) { 

				?>
				<!--display error to the user-->
				<script>alert("Register failed!\nThe account already exist");</script>
				<?php

				//display register interface if the user failed to register
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=Register.php\"/>";

			} else {
				//if user successfully register

				//INSERT INTO `student`(`studID`, `studFName`, `studLName`, `studEmail`, `studPassword`, `studPhoneNum`, `classID`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')

				$query = "INSERT INTO student (studID, studFName, studLName, studEmail, studPassword) VALUES ('".$uitmid."','".$fname."','".$lname."','".$email."','".$password."')";

				//execute query in student table (insert data)
				mysqli_query($connection, $query);

				//direct to login page
				header('location: Login.php');
			}

		} else {
			//Register process for lecturer (Examiner and Supervisor)

			//query to retrieve all the data in lecturer table
			$query = "SELECT * FROM lecturer WHERE lectID = '".$uitmid."'";

			//execute query in each row of the lecturer table
			$result = mysqli_query($connection, $query);
			$checkRow = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);

			//if uitm id already exist
			if ($row['lectID'] == $uitmid) { 

				?>
				<!--display error to the user-->
				<script>alert("Register failed!\nThe account already exist");</script>
				<?php

				//display register interface if the user failed to register
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=Register.php\"/>";

			} else {
				//if user successfully register

				//INSERT INTO `lecturer`(`lectID`, `lectFName`, `lectLName`, `lectEmail`, `lectPassword`, `lectPhoneNum`, `lectRoomNum`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')

				$query = "INSERT INTO lecturer (lectID, lectFName, lectLName, lectEmail, lectPassword) VALUES ('".$uitmid."','".$fname."','".$lname."','".$email."','".$password."')";

				//execute query in lecturer table (insert data)
				mysqli_query($connection, $query);

				//direct to login page
				header('location: Login.php');
			}
		}
	?>
</body>
</html>