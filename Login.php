<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>EDMS FSKM UiTM</title>

	<!-- favicon -->
	<link rel="website icon" type="png" href="images/favicon.png">

	<!-- Link CSS file -->
	<link rel="stylesheet" href="styleOut.css">

	<!-- FontAwesome for icon -->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.3/css/all.min.css">-->
	<script src="https://kit.fontawesome.com/2fcc26b571.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
	<div class="body">
		<div class="container">

			<!--UiTM logo-->
			<div class="uitmLogo">
				<img src="images/uitm.png">
			</div>

			<!--Login font-->
			<div class="login">
				<h1>Login</h1>
			</div>

			<hr>

			<!--Login form-->
			<div class="loginForm">
				<form action="LoginProcess.php" method="POST">

					<!--user category-->
					<div class="radioType">
						<!--Admin-->
						<input  onclick="change('Lecturer ID'); changePh('Enter your lecturer ID')" type="radio" name="typeStatus" id="lecturer" value="admin" required> Admin

						<!--Lecturer-->
						<input  onclick="change('Lecturer ID'); changePh('Enter your lecturer ID')" type="radio" name="typeStatus" id="lecturer" value="lecturer" required> Lecturer

						<!--Student-->
						<input onclick="change('Student ID'); changePh('Enter your student ID')" type="radio" name="typeStatus" id="student" value="student" required> Student
					</div>

					<!--change the input box description-->
					<script type="text/javascript">
						function change(newText){
							document.getElementById("idChange").innerHTML = newText;
						}
					</script>

					<script type="text/javascript">
						function changePh(newPh) {
							document.getElementById("txtId").placeholder = newPh;
						}
					</script>
					
					<hr><br>

					<!--input for lecturer/student ID-->
					<div class="idInput" id="idInput">
						<i class="fa-solid fa-id-card"></i></i><span id="idChange">UiTM ID Number</span>
						<br>
						<input class="txtId" type="text" name="txtId" id="txtId" placeholder="Enter your UiTM ID Number" required>
					</div>

					<br>

					<!-- input password -->
					<div class="passInput">
						<i class="fa-solid fa-lock"></i><span>Password</span>
						<br>
						<input class="txtPass" type="Password" name="txtPass" id="txtPass" placeholder="Enter your password" required>
					</div>

					<br><br>

					<!--Login button-->
					<input class="submit" type="submit" name="submit" id="submit" value="Login">

				</form>
			</div>

			<!--forgot password link-->
			<div class="forgotPass">
				<a href="#">forgot password?</a>
			</div>

			<br><br>

			<!--Register account link-->
			<div class="linkRegis">
				<!--<p>Didn't have any account yet? Register <a href="Register.php">Here</a> </p>-->
			</div>

		</div>
	</div>
</body>
</html>