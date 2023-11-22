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
            <li><a href="#admin.php"><i class='bx bx-user-plus icon'></i> Admin</a></li>

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

            <!--page title-->
            <h1 class="title"> Class </h1>

            <!--path-->
            <ul class="breadcrumbs">
                <li><a href="class.php">Class</a></li>

                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

                <li><a href="addClass.php" class="active">Add class</a></li>
            </ul>

            <br>

            <div class="titleContentWButton">
                <!--header content for forms and rubics list-->
                <h1 class="titleContent">Add class</h1>
            </div>

            <!--content for class list-->
            <div class="data">
                <div class="content-data">

                    <fieldset>
                        <legend>
                            Add class form
                        </legend>
                        
                        <form action="addClassProcess.php" method="POST" enctype="multipart/form-data">
                            <div class="form-details">

                                <div class="input-box">
                                    <i class="fa-solid fa-hashtag"></i>
                                    <span class="details">Class name</span>

                                    <input type="text" 
                                    placeholder="Enter class name"
                                    name="className"
                                    required>
                                </div>
                                
                                <div class="input-box">
                                    <i class='bx bx-calendar'></i>
                                    <span class="details">Year</span>

                                    <input type="text" 
                                    placeholder="Enter class year"
                                    name="classYear"
                                    required>
                                </div>

                                <div class="input-box">
                                    <i class='bx bx-calendar'></i>
                                    <span class="details">Class session</span><br>
                                    <select name="classSession" required>
                                        <option value="" disabled selected hidden>Select session</option>
                                        <option value="2">First session</option>
                                        <option value="4">Second session</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-user-badge' ></i>
                                    <span class="details">Lecturer</span><br>

                                    <select name="lectName" required>
                                        <option value="" disabled selected hidden>Select lecturer</option>
                                        <?php
                                        $sql = "SELECT * FROM admin";
                                        $query = mysqli_query($connection, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $row["adminID"]; ?>">
                                                <?php echo $row["adminName"]; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="button">
                                <input type="submit" value="Add" name="addClass" id="addClass">
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