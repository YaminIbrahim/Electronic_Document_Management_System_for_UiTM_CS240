<?php
	//using session to track user information
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>EDMS FSKM UiTM</title>

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
		$password = $_POST["txtPass"];
		$type = $_POST["typeStatus"];

		//login process for student
		$query = "";

		if ($type == "student") {

			//student
			$query = "SELECT * FROM student WHERE studID = '" . $uitmid . "' AND studPassword = '" . $password . "'";
		
		} else {

			//lecturer (supervisor and examiner)
			if ($type == "lecturer") {
				$query = "SELECT * FROM lecturer WHERE lectID = '" . $uitmid . "' AND lectPassword = '" . $password . "'";

			} else {

				//admin
				$query = "SELECT * FROM admin WHERE adminID = '" . $uitmid . "' AND adminPassword = '" . $password . "'";

			}
		}

		//execute query in each row of the student and staff table
		$result = mysqli_query($connection, $query);
		$checkRow = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);

		//login failed (email didn't match with the password), stay at Login.php
		if ($checkRow == 0) {

			?>
			
			<!--informing the user the error has occured-->
			<script>alert("Login failed!\nYour password did not match with email or you have not registered");</script>
			
			<?php
		    
		    //stay at Login.php
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=Login.php\"/>";

		} else {
			if ($type == "student") {
				//login success or student

				//forward to the student home page
				echo "<meta http-equiv=\"refresh\" content=\"2;URL=Student/Home.php\"/>";

				//`studID`, `studName`, `studEmail`, `studPassword`, `studPhoneNum`, `studFYPTitle`, `studSV`, `studExam`, `classID`
				//pass the user information via session
				$_SESSION["stud_id"] = $row["studID"];
				$_SESSION["stud_name"] = $row["studName"];
				$_SESSION["stud_email"] = $row["studEmail"];
				$_SESSION["stud_password"] = $row["studPassword"];
				$_SESSION["stud_phonenum"] = $row["studPhoneNum"];
				$_SESSION["stud_fyptitle"] = $row["studFYPTitle"];
				$_SESSION["stud_studsv"] = $row["studSV"];
				$_SESSION["stud_exam"] = $row["studExam"];
				$_SESSION["stud_classid"] = $row["classID"];
				$_SESSION["log"] = 1;

			} else {
				if ($type == "lecturer") {
					//login success for lecturer

					//forward to the lecturer home page
					echo "<meta http-equiv=\"refresh\" content=\"2;URL=Lecturer/Home.php\"/>";
					
					//`lectID`, `lectName`, `lectEmail`, `lectOuriginalEmail`, `lectPassword`, `lectPhoneNum`, `lectRoomNum`
					//pass the user information via session
					$_SESSION["lect_id"] = $row["lectID"];
					$_SESSION["lect_name"] = $row["lectName"];
					$_SESSION["lect_email"] = $row["lectEmail"];
					$_SESSION["lect_oemail"] = $row["lectOuriginalEmail"];
					$_SESSION["lect_password"] = $row["lectPassword"];
					$_SESSION["lect_phonenum"] = $row["lectPhoneNum"];
					$_SESSION["lect_roomnum"] = $row["lectRoomNum"];
					$_SESSION["log"] = 2;

				} else {
					//login success for admin

					//forward to the admin home page
					echo "<meta http-equiv=\"refresh\" content=\"2;URL=Admin/Home.php\"/>";
					
					//pass the user information via session
					$_SESSION["admin_id"] = $row["adminID"];
					$_SESSION["admin_name"] = $row["adminName"];
					$_SESSION["admin_email"] = $row["adminEmail"];
					$_SESSION["admin_oemail"] = $row["adminOuriginalEmail"];
					$_SESSION["admin_password"] = $row["adminPassword"];
					$_SESSION["admin_phonenum"] = $row["adminPhoneNum"];
					$_SESSION["admin_roomnum"]= $row["adminRoomNum"];
					$_SESSION["log"] = 3;
				}
			}
		}
	?>
</body>
</html>