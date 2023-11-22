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
            <li><a href="Home.php" ><i class='bx bx-home-alt icon' ></i>Dashboard</a></li>

            <!--devider Main text-->
            <li class="divider" data-text="main">Main</li>

            <!--Form and rubric link-->
            <li><a href="FormRubric.php"><i class='bx bx-file icon'></i> Forms & Rubrics</a></li>

            <!--Add student link-->
            <li><a href="supervisor.php"><i class='bx bx-user-pin icon'></i> Supervisor </a></li>

            <!--Add request link-->
            <li><a href="docSubmit.php"><i class='bx bx-file-blank icon'></i> Document submission </a></li>

            <!--Setting & Support text-->
            <li class="divider" data-text="ADDITIONAL">Setting & Support</li>

            <!--Nested Setting & Support links-->
            <li>
                <a href="#" class="active"><i class='bx bx-cog icon' ></i> Profile & Support <i class='bx bx-chevron-right icon-right' ></i></a>

                <!--unlisted list (drop down)-->
                <ul class="side-dropdown">
                    <li><a href="profile.php"><i class='bx bx-user icon' ></i>Profile</a></li>
                    <li><a href="support.php"><i class='bx bx-support icon' ></i> Support</a></li>
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
                    <i class='bx bx-search icon' style="opacity:0"></i>
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
                if (isset($_SESSION["log"]) && ($_SESSION["log"] == 1)) {
                    ?>

                    <!--user fullname-->
                    <div class="userFullName">
                        <p><?php echo $_SESSION["stud_name"] ?></p>
                    </div>

                    <!--user id-->
                    <div class="userID">
                        <p><?php echo $_SESSION["stud_id"]; ?></p>
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
                    <li><a href="profile.php"><i class='bx bx-user icon'></i>Profile</a></li>
                    
                    <!--Logout-->
                    <li><a href="/Edms/Logout.php"><i class='bx bx-log-out-circle icon'></i> Logout</a></li>
                </ul>

            </div>
        </nav>

        <!--main content-->
        <main>
            <!--page title-->
            <h1 class="title">Profile</h1>

            <!--path-->
            <ul class="breadcrumbs">
                <li><a href="student.php">Profile</a></li>

                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

                <li><a href="student.php" class="active">...</a></li>
            </ul>

            <br>

            <!--<div class="titleContentWButton">-->
                <!--header content for forms and rubics list-->
                <!--<h1 class="titleContent">Profile</h1>

                <button class="addBtn" onclick="location.href='assignExaminer.php'" type="button">
                    <i class='bx bx-cog'></i> Setting
                </button>
            </div>-->

            <!--content for class list-->
            <div class="data">

                
                <!--Class list data-->
                <div class="content-data">
                    <div class="content-data">
                    <fieldset>
                        
                        <img src="/Edms/images/userdp.png" style="width: 200px; margin-left: 450px;">
                        <form action="addAdminProcess.php" method="POST" enctype="multipart/form-data">
                            <div class="form-details">

                                <!-- `studID`, `studName`, `studEmail`, `studPassword`, `studPhoneNum`, `studFYPTitle`, `studSV`, `studExam`, `classID`-->
                                
                                <div class="input-box">
                                    <i class="fa-solid fa-hashtag"></i>
                                    <span class="details">Staff ID</span>
                                    <input type="text" 
                                           name="staffID"
                                           value="<?php echo $_SESSION["stud_id"]; ?>" 
                                           required
                                           readonly>
                                </div>
                                
                                <div class="input-box">
                                    <i class="fa fa-solid fa-id-card"></i>
                                    <span class="details">First Name</span>

                                    <input type="text" 
                                           name="fName"
                                           value="<?php echo $_SESSION['stud_name']; ?>" 
                                           required
                                           readonly>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-envelope' ></i>
                                    <span class="details">Email Address</span>

                                    <input type="text" 
                                           name="email"
                                           value="<?php echo $_SESSION['stud_email']; ?>" 
                                           required
                                           readonly>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-building-house' ></i>
                                    <span class="details">Room Number</span>

                                    <input type="text" 
                                           name="roomNum"
                                           value="<?php echo $_SESSION['stud_phonenum']; ?>" 
                                           required
                                           readonly>
                                </div>
                                
                            </div>
                            
                            
                        </form>
                    </fieldset>
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