<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		//recall from login.php form
		$uitmid = $_POST["txtId"];
		$fname = $_POST["txtFname"];
		$lname = $_POST["txtLname"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPass"];
		$type = $_POST["typeStatus"];

		echo $uitmid.$fname.$lname.$email.$password.$type;
	?>
</body>
</html>