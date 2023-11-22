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
            <li><a href="meetRecord.php"><i class='bx bxs-conversation icon'></i> Meeting Record </a></li>



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
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon' ></i>
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
                <li><a href="report.php">Record</a></li>

                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

                <li><a href="report.php" class="active">Report</a></li>
            </ul>

            <br>

            <!--content for class list-->
            <div class="data">

                <?php
                // Fetch all distinct class names from the student table
                $sqlClassNames = "SELECT DISTINCT classID FROM student";
                $resultClassNames = mysqli_query($connection, $sqlClassNames);

                while ($classRow = mysqli_fetch_array($resultClassNames)) {
                    $className = $classRow["classID"];
                    ?>

                    <!--Class list data-->
                    <div class="content-data">

                        <div class="titleContentWButton">
                            <!--header content for forms and rubics list-->
                            <h1 class="titleContent"><?php echo $className; ?></h1>

                            <!--add document button-->
                            <a href="reportExport.php?className=<?php echo $className; ?>" style="float: right;";>
                                <button class="addBtn" type="button">
                                    Export
                                </button>
                            </a>
                        </div>

                        <table>
                            <tr>
                                <th>no</th>
                                <th>student id</th>
                                <th>full name</th>
                                <th>email</th>
                                <th>phone number</th>
                                <th>supervisor</th>
                                <th>examiner</th>
                                <th>class</th>
                            </tr>

                            <?php
    // Fetch students for the current class with supervisor and examiner names
// Fetch students for the current class with supervisor and examiner names
                            $sqlStudents = "SELECT s.studID, s.studName, s.studEmail, s.studPhoneNum, 
                            COALESCE(sv.lectName, ad1.adminName, 'No Supervisor assigned') AS supervisor_name,
                            COALESCE(ex.lectName, ad2.adminName, 'No Examiner assigned') AS examiner_name,
                            s.classID
                            FROM student s
                            LEFT JOIN lecturer sv ON s.studSV = sv.lectID
                            LEFT JOIN lecturer ex ON s.studExam = ex.lectID
                            LEFT JOIN admin ad1 ON s.studSV = ad1.adminID
                            LEFT JOIN admin ad2 ON s.studExam = ad2.adminID
                            WHERE s.classID = '$className'";

                            $resultStudents = mysqli_query($connection, $sqlStudents);

// Reset count for each class
                            $count = 1;

                            while ($row = mysqli_fetch_array($resultStudents)) {
                                ?>

                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row["studID"] ?></td>
                                    <td><?php echo $row["studName"] ?></td>
                                    <td><?php echo $row["studEmail"] ?></td>
                                    <td><?php echo $row["studPhoneNum"] ?></td>
                                    <td><?php echo $row["supervisor_name"] ?></td>
                                    <td><?php echo $row["examiner_name"] ?></td>
                                    <td><?php echo $row["classID"] ?></td>
                                </tr>

                                <?php
                                $count++;
                            }
                            ?>
                        </table>
                    </div>

                    <?php
                }
                ?>
            </div>
        </main>
    </section>

    <!--link chart-->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--Link JS file-->
    <script src="script.js"></script>
</body>
</html>