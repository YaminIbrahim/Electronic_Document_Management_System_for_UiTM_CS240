<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Logout</title>

	<link rel="stylesheet" type="text/css" href="Loader.css">
</head>

<body>
	<div class="loadBox">
		<div class="loader loader_bubble"></div>
	</div>

	<?php
		session_start();

		//release all session from user

		//for student session
		if ($_SESSION["log"] == 1) {

			unset($_SESSION['stud_id']);
			unset($_SESSION['stud_fname']);
			unset($_SESSION['stud_lname']);
			unset($_SESSION['stud_email']);

		} else if ($_SESSION["log"] == 2) {

			//for lecturer session
			unset($_SESSION['lect_id']);
			unset($_SESSION['lect_fname']);
			unset($_SESSION['lect_lname']);
			unset($_SESSION['lect_email']);

		} else {
			unset($_SESSION['admin_id']);
			unset($_SESSION['admin_fname']);
			unset($_SESSION['admin_lname']);
			unset($_SESSION['admin_email']);
		}

		//terminate user session
		unset($_SESSION['log']);
		session_destroy();

		//direct to the login page
		echo "<meta http-equiv=\"refresh\" content=\"2;url=Login.php\">";
	?>
</body>
</html>