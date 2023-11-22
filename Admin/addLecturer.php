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
            <li><a href="class.php"><i class='bx bx-group icon' ></i></i> Class</a></li>

            <!--Add admin link-->
            <li><a href="admin.php" ><i class='bx bx-user-plus icon'></i> Admin</a></li>

            <!--Nested Record links-->
            <li>
                <a href="#" class="active"><i class='bx bx-folder icon' ></i> Record <i class='bx bx-chevron-right icon-right' ></i></a>

                <!--unlisted list (drop down)-->
                <ul class="side-dropdown">
                    <li><a href="lecturer.php" class="active"><i class='bx bx-list-ol icon'></i>Lecturers list</a></li>
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

            <!--page title-->
            <h1 class="title">Record</h1>

            <!--path-->
            <ul class="breadcrumbs">
                <li><a href="lecturer.php">Record</a></li>

                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

                <li><a href="lecturer.php">Lecturer</a></li>

                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

                <li><a href="addLecturer.php" class="active">Add lecturer</a></li>
            </ul>

            <br>

            <!--content for class list-->
            <div class="data">

                <!--Class list data-->
                <div class="content-data">
                    <div class="titleContentWButton">
                        <!--header content for forms and rubics list-->
                        <h1 class="titleContent">Create lecturer account</h1>
                    </div>


                    <fieldset>
                        <!--<legend>
                            Create lecturer account form
                        </legend>-->
                        
                        <form action="addLecturerProcess.php" method="POST" enctype="multipart/form-data">
                            <div class="form-details">

                                <!--`lectID`, `lectFName`, `lectLName`, `lectEmail`, `lectPassword`, `lectPhoneNum`, `lectRoomNum-->
                                
                                <div class="input-box">
                                    <i class="fa-solid fa-hashtag"></i>
                                    <span class="details">Staff ID</span>
                                    <input type="text" 
                                    placeholder="Enter your staff ID"
                                    name="staffID"
                                    required>
                                </div>
                                
                                <div class="input-box">
                                    <i class="fa fa-solid fa-id-card"></i>
                                    <span class="details">First Name</span>

                                    <input type="text" 
                                    placeholder="Enter your first name"
                                    name="name"
                                    required>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-envelope' ></i>
                                    <span class="details">Email Address</span>

                                    <input type="text" 
                                    placeholder="Enter your email address"
                                    name="email"
                                    required>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-envelope' ></i>
                                    <span class="details">UiTM Ouriginal Email Address</span>

                                    <input type="text" 
                                           placeholder="Enter your email address"
                                           name="emailOuriginal"
                                           required>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-phone' ></i>
                                    <span class="details">Phone Number</span>

                                    <input type="text" 
                                    placeholder="Enter your phone number"
                                    name="phoneNum"
                                    required>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-building-house' ></i>
                                    <span class="details">Room Number</span>

                                    <input type="text" 
                                    placeholder="Enter your room number"
                                    name="roomNum"
                                    required>
                                </div>
                                
                            </div>
                            
                            <div class="button">
                                <input type="submit" value="Add" name="addLect" id="addLect">
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>



            <div class="data">
                <div class="content-data">

                    <div class="titleContentWButton">
                        <!--header content for forms and rubics list-->
                        <h1 class="titleContent">Add lecturers using CSV file</h1>

                        <!--add document button-->
                        <!--<a href="classAddStudentFile.php?classID=<?php echo $class_id; ?>">
                            <button class="addBtn" type="button">
                                Add using file
                            </button>
                        </a>-->
                        
                    </div>

                    <fieldset>
                        <!--<legend>
                            Add student using CSV file
                        </legend>-->

                        <form action="addLecturerProcess.php" method="POST" enctype="multipart/form-data">
                            <div class="form-details">

                                <div class="input-box">
                                    <i class="fa-solid fa-hashtag"></i>
                                    <span class="details">Upload file</span>

                                    <input type="text" name="classID" id="classID" value="Select CSV file" readonly>
                                </div>

                                <div class="input-box">
                                    <input class="upload-box" type="file" name="file" id="file" accept=".csv" required style="border: 0px; margin-top: 25px;">
                                </div>

                                <input type="text" name="classID" id="classID" value='<?php echo $class_id; ?>' hidden>

                            </div>

                            <div class="button">
                                <input type="submit" value="Add" name="import" id="import">
                            </div>
                        </form>
                    </fieldset>
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