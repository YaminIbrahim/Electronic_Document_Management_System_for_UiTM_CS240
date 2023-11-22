<?php
    //store and retrieve data across multiple pages for the same user
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>EDMS FSKM UiTM</title>

	<!--favicon icon-->
	<link rel="website icon" type="png" href="/Edms/images/favicon.png">

	<!--Link CSS file-->
	<link rel="stylesheet" href="StyleHome.css">

	<!--bootstrap boxicon for icon-->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!--bootstrap fontawesome for icon-->
	<script src="https://kit.fontawesome.com/2fcc26b571.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<!-- import database connection file -->
	<?php 
	include("../Dbconn.php"); 
	?>
</head>

<body>
	<!--sidebar/side navigation-->
	<section id="sidebar">

		<!--system name-->
		<a href="Home.php" class="brand">
			<img class="logo" src="/Edms/images/logo.png" alt="Logo">
			DocFYP
		</a>

		<!--list for navigation-->
		<ul class="side-menu">

			<!--link dashboard/home page-->
			<li><a href="Home.php"><i class='bx bx-home-alt icon' ></i>Dashboard</a></li>

			<!--devider Main text-->
			<li class="divider" data-text="main">Main</li>

			<!--Form and rubric link-->
			<li><a href="FormRubric.php"><i class='bx bx-file icon'></i> Forms & Rubrics</a></li>

			<!--Add class link-->
			<li><a href="class.php" class="active"><i class='bx bx-group icon' ></i></i> Class</a></li>

			<!--Add admin link-->
			<li><a href="admin.php"><i class='bx bx-user-plus icon'></i> Admin</a></li>

			<!--Nested Record links-->
			<li>
				<a href="#"><i class='bx bx-folder icon' ></i> Record <i class='bx bx-chevron-right icon-right' ></i></a>

				<!--unlisted list (drop down)-->
				<ul class="side-dropdown">
					<li><a href="lecturer.php"><i class='bx bx-list-ol icon'></i>Lecturers list</a></li>
					<li><a href="student.php"><i class='bx bx-list-ol icon'></i>Students list</a></li>
					<li><a href="report.php"><i class='bx bxs-report icon'></i> Report </a></li>
				</ul>
			</li>



			<!--Side text-->
			<li class="divider" data-text="SIDE">Side Features</li>

			<!--Add student link-->
			<li><a href="studentIC.php"><i class='bx bx-group icon' ></i></i>In charge Student</a></li>

			<!--Add request link-->
			<li><a href="requestSupervise.php"><i class='bx bx-message-alt-add icon'></i> Request Supervise </a></li>

			<!--Add request link-->
			<!--<li><a href="meetRecord.php"><i class='bx bxs-conversation icon'></i> Meeting Record </a></li>-->



			<!--Setting & Support text-->
			<li class="divider" data-text="ADDITIONAL">Setting & Support</li>

			<!--Nested Setting & Support links-->
			<li>
				<a href="#"><i class='bx bx-cog icon' ></i> Profile & Support <i class='bx bx-chevron-right icon-right' ></i></a>

				<!--unlisted list (drop down)-->
				<ul class="side-dropdown">
					<li><a href="profile.php"><i class='bx bx-user icon' ></i>Profile</a></li>
					<li><a href="#"><i class='bx bx-support icon' ></i> Support</a></li>
				</ul>
			</li>

			<!--logout-->
			<li><a href="/Edms/Logout.php"><i class='bx bx-log-out-circle icon'></i> Logout</a></li>
		</ul>
	</section>

	<section id="content">
		<!--topbar-->
		<nav>
			<!--Hamburger icon-->
			<i class='bx bx-menu toggle-sidebar' ></i>

			<!--Search box-->
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search..." hidden>
					<i class='bx bx-search icon' style="opacity:0;"></i>
				</div>
			</form>

			<!--notification (KIV)-->
            <!--
            <a href="#" class="nav-link">
                <i class='bx bxs-bell icon' ></i>
                <span class="badge">5</span>
            </a>-->

            <div class="sessionInfo">
            	<!--retrieve current user information via session-->
            	<?php
            	if (isset($_SESSION["log"]) && ($_SESSION["log"] == 3)) {
            		?>

            		<!--user fullname-->
            		<div class="userFullName">
            			<p><?php echo $_SESSION["admin_name"] ?></p>
            		</div>

            		<!--user id-->
            		<div class="userID">
            			<p><?php echo $_SESSION["admin_id"]; ?></p>
            		</div>
            		<?php
            	} else {
            		echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Login.php\"/>";
            	}
            	?>
            </div>

            <!--profile picture-->
            <span class="divider"></span>
            <div class="profile">

            	<!--profile picture-->
            	<img src="/Edms/images/userdp.png" alt="Profile picture">

            	<!--Nested list (drop down)-->
            	<ul class="profile-link">

            		<!--Profile link-->
            		<li><a href="#"><i class='bx bx-user icon'></i>Profile</a></li>

            		<!--Logout-->
            		<li><a href="/Edms/Logout.php"><i class='bx bx-log-out-circle icon'></i> Logout</a></li>
            	</ul>

            </div>
        </nav>

        <!--main content-->
        <main>

        	<?php
        	$stud_id = $_GET['studID'];

        	$sql = "SELECT * FROM student WHERE studID = '" .$stud_id. "'";

        	$query = mysqli_query($connection, $sql) or die("Query Fail");
        	$data = mysqli_fetch_array($query);
        	?>

        	<!--page title-->
        	<h1 class="title"> Class </h1>

        	<!--path-->
        	<ul class="breadcrumbs">
        		<li><a href="class.php">Class</a></li>

        		<li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

        		<li><a href="classDetail.php?classID=<?php echo$data['classID']; ?>">Class details</a></li>

        		<li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

        		<li><a href="classDetailStudent.php" class="active">Student details</a></li>
        	</ul>

        	<br>

        	

        	<!--content for class list-->
        	<div class="data">
        		<div class="content-data">
        			<div class="titleContentWButton">
        				<!--header content for forms and rubics list-->
        				<h1 class="titleContent">Student detail</h1>
        			</div>

        			<fieldset>
        				<form action="editClassProcess.php" method="POST" enctype="multipart/form-data">
        					<div class="form-details">

        						<div class="input-box">
        							<i class="fa-solid fa-hashtag"></i>
        							<span class="details">Student ID</span>

        							<input type="text" 
        							value="<?php echo $data['studID']; ?>" 
        							name="classID"
        							readonly>
        						</div>

        						<div class="input-box">
        							<i class='bx bxs-user'></i>
        							<span class="details">Name</span>

        							<input type="text" 
        							value="<?php echo $data['studName']; ?>" 
        							name="className"
        							readonly>
        						</div>

        						<div class="input-box">
        							<i class='bx bx-envelope' ></i>
        							<span class="details">Email</span>

        							<input type="text" 
        							value="<?php echo $data['studEmail']; ?>"
        							name="classYear"
        							readonly>
        						</div>

        						<div class="input-box">
        							<i class='bx bxs-phone' ></i>
        							<span class="details">Phone Number</span>

        							<input type="text" 
        							value="<?php echo $data['studPhoneNum']; ?>"
        							name="classSession"
        							readonly>
        						</div>

        						<?php
        						$sql = "SELECT * FROM lecturer WHERE lectID = '".$data['studSV']."'";
        						$query = mysqli_query($connection, $sql);
        						$rowSV = mysqli_fetch_array($query);

        						$sql = "SELECT * FROM lecturer WHERE lectID = '".$data['studExam']."'";
        						$query = mysqli_query($connection, $sql);
        						$rowExam = mysqli_fetch_array($query);

        						// Check if the supervisor is assigned or not
        						if (!empty($data['studSV'])) {
        							$sqlSV = "SELECT * FROM lecturer WHERE lectID = '" . $data['studSV'] . "'";
        							$sqlAdminSV = "SELECT * FROM admin WHERE adminID = '" . $data['studSV'] . "'";
        							$querySV = mysqli_query($connection, $sqlSV);
        							$queryAdminSV = mysqli_query($connection, $sqlAdminSV);
        							$rowSV = mysqli_fetch_array($querySV);
        							$rowAdminSV = mysqli_fetch_array($queryAdminSV);
        						} else {
        							$rowSV = null;
        							$rowAdminSV = null;
        						}

								// Check if the examiner is assigned or not
        						if (!empty($data['studExam'])) {
        							$sqlExam = "SELECT * FROM lecturer WHERE lectID = '" . $data['studExam'] . "'";
        							$sqlAdminExam = "SELECT * FROM admin WHERE adminID = '" . $data['studExam'] . "'";

        							$queryExam = mysqli_query($connection, $sqlExam);
        							$queryAdminExam = mysqli_query($connection, $sqlAdminExam);

        							$rowExam = mysqli_fetch_array($queryExam);
        							$rowAdminExam = mysqli_fetch_array($queryAdminExam);
        						} else {
        							$rowExam = null;
        							$rowAdminExam = null;
        						}
        						?>

        						<div class="input-box">
        							<i class='bx bxs-user-badge' ></i>
        							<span class="details">Supervisor</span><br>
        							<input type="text" 
        							value="<?php echo ($rowSV != null) ? $rowSV['lectName'] : (($rowAdminSV != null) ? $rowAdminSV['adminName'] : "No Supervisor assigned"); ?>"
        							name="classSession"
        							readonly>
        						</div>

        						<div class="input-box">
        							<i class='bx bxs-user-badge' ></i>
        							<span class="details">Examiner</span><br>
        							<input type="text" 
        							value="<?php echo ($rowExam != null) ? $rowExam['lectName'] : (($rowAdminExam != null) ? $rowAdminExam['adminName'] : "No Examiner assigned"); ?>"
        							name="classSession"
        							readonly>
        						</div>


        						<div class="input-box">
        							<i class="fa-solid fa-book"></i>
        							<span class="details">Project Title</span><br>

        							<input type="text" style="width: 1157px;"
        							value="<?php echo $data['studFYPTitle']; ?>"
        							name="classSession"
        							readonly>
        						</div>

        					</div>
        				</form>
        			</fieldset>
        		</div>
        	</div>

        	<div class="data">
        		<div class="content-data">
        			<div class="titleContentWButton">
        				<!--header content for forms and rubics list-->
        				<h1 class="titleContent">Document list</h1>

        				<!--examiner filter-->
        				<a href="classDetailLecturer.php?studID=<?php echo $data['studID']; ?>" class="active">
        					<button class="addBtn" style="margin: 0 10px;">
        						Lecturer
        					</button>
        				</a>

        				<!--examiner filter-->
        				<a href="classDetailExaminer.php?studID=<?php echo $data['studID']; ?>" class="active">
        					<button class="addBtn" style="margin: 0 10px; background: #2618c9; color: white;">
        						Examiner
        					</button>
        				</a>

        				<!--supervisor filter-->
        				<a href="classDetailSupervisor.php?studID=<?php echo $data['studID']; ?>" class="active">
        					<button class="addBtn" style="margin: 0 10px;">
        						Supervisor
        					</button>
        				</a>

        				<!--student filter-->
        				<a href="classDetailStudent.php?studID=<?php echo $data['studID']; ?>" class="active">
        					<button class="addBtn" style="margin: 0 10px;">
        						Student
        					</button>
        				</a>
        				
        				<div class="filter" style="float: right; margin-top: 5px;">
        					<i class='bx bx-filter-alt'></i>
        					<span class="details" style="opacity: 0.5;">Filter</span>
        				</div>
        			</div>

        			<?php
                	//query
        			$sql = "SELECT * FROM document WHERE uploadBy = '".$data['studExam']."'";
        			$query = mysqli_query($connection, $sql) or die("not found");
        			$row= mysqli_fetch_array($query);

        			$sqlDocType = "SELECT * FROM doctype WHERE docDecs = 'Supervisor and examiner marks required' OR docDecs = 'All marks required'";
        			$queryDocType = mysqli_query($connection, $sqlDocType) or die("not found");
        			
                	//count NO
        			$count = 1;
        			?>

        			<!--Class list data-->
        			<div class="content-data">
        				<table>
        					<tr>
        						<th>no</th>
        						<th>code</th>
        						<th>name</th>
        						<th>status</th>
        						<th>action</th>
        					</tr>

        					<?php 
        					while ($rowDocType= mysqli_fetch_array($queryDocType)) {
        						$sqlCheckDoc = "SELECT * FROM document WHERE docCode = '" . $rowDocType["docCode"] . "' AND uploadBy = '" . $data['studExam'] . "'";

        						$queryCheckDoc = mysqli_query($connection, $sqlCheckDoc);

        						$getDocID = mysqli_fetch_array($queryCheckDoc);

        						$status = (mysqli_num_rows($queryCheckDoc) > 0) ? "<img src='/Edms/images/yes.png' style='width:20px; height: 20px;'>" : "<img src='/Edms/images/no.png' style='width:20px; height: 20px;'>";
        						?>

        						<tr>
        							<td><?php echo $count; ?></td>
        							<td><?php echo $rowDocType["docCode"]; ?></td>
        							<td><?php echo $rowDocType["docName"]; ?></td>
        							<td><?php echo $status; ?></td>
        							<td>
        								<a class="dw" target="_blank" href="classDetailVDD.php?docView=<?php echo $getDocID["docID"]; ?>&studID=<?php echo $stud_id ?>">
        									<button class="actionBtn">
        										View
        									</button>
        								</a>

        								<a class="dw" target="_blank" href="classDetailVDD.php?docDw=<?php echo $getDocID["docID"]; ?>&studID=<?php echo $stud_id ?>">
        									<button class="actionBtn">
        										Download
        									</button>
        								</a>
        							</td>        							
        						</tr>
        						<?php
        						$count++; 
        					}
        					?>
        				</table>
        			</div>
        		</div>
        	</div>
        </main>
    </section>

    <!--link chart-->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--Link JS file-->
    <script src="script.js"></script>
</body>
</html>
