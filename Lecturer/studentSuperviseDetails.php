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

            <!--Add student link-->
            <li><a href="student.php" class="active"><i class='bx bx-group icon' ></i></i> Student</a></li>

            <!--Add request link-->
            <li><a href="requestSupervise.php"><i class='bx bx-message-alt-add icon'></i> Request Supervise </a></li>

            <!--Setting & Support text-->
            <li class="divider" data-text="ADDITIONAL">Setting & Support</li>

            <!--Nested Setting & Support links-->
            <li>
                <a href="#"><i class='bx bx-cog icon' ></i> Profile & Support <i class='bx bx-chevron-right icon-right' ></i></a>

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
                if (isset($_SESSION["log"]) && ($_SESSION["log"] == 2)) {
                    ?>

                    <!--user fullname-->
                    <div class="userFullName">
                        <p><?php echo $_SESSION["lect_fname"] . " " . $_SESSION["lect_lname"]; ?></p>
                    </div>

                    <!--user id-->
                    <div class="userID">
                        <p><?php echo $_SESSION["lect_id"]; ?></p>
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
            <h1 class="title">Student</h1>

            <!--path-->
            <ul class="breadcrumbs">
                <li><a href="FormRubric.php">Student</a></li>

                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>

                <li><a href="Home.php" class="active">Student Details</a></li>
            </ul>

            <br>

            <div class="titleContentWButton">
                <!--header content for forms and rubics list-->
                <h1 class="titleContent">Student Details</h1>
            </div>

            <!--content for class list-->
            <div class="data">

                <?php
                //SELECT `studID`, `studFName`, `studLName`, `studEmail`, `studPassword`, `studPhoneNum`, `studSV`, `studExam`, `classID` FROM `student` WHERE 1

                //query to select all student data from database
                $sql = "SELECT * FROM doctype ORDER BY docCode ASC";
                $query = mysqli_query($connection, $sql) or die("not found");

                //count NO
                $count = 1;
                ?>

                <!--Class list data-->
                <div class="content-data">
                    <h2>Muhammad Yamin bin Ibrahim</h2>
                    <h4 style="opacity: 0.5;">Electronic Document Management System (EDMS) For UiTM CS240 Forms and Evaluation Rubrics</h4>
                    <h4 style="opacity: 0.5;">Supervise</h4> <br>
                    <table>
                        <table>
                        <tr>
                            <th>no</th>
                            <th>Document id</th>
                            <th>document name</th>
                            <th>Status</th>
                            <th>Submission date</th>
                            <th>action</th>
                            <th>Marks</th>
                            <th>Upload document</th>
                        </tr>

                        <?php 
                            while ($row= mysqli_fetch_array($query)) {
                        ?>

                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row["docCode"] ?></td>
                            <td><?php echo $row["docName"] ?></td>
                            <td> <img src="/Edms/images/yes.png" style="width:20px; height: 20px;"> </td>
                            <td>15/<?php $count; ?>/2023</td>
                            
                            <td> 
                                <button>View</button>
                                <button>Downlaod</button>
                            </td>
                            <td>
                                Total marks:
                                <input type="number" name="" placeholder="Enter total marks">
                            </td>
                            <td>
                                <form>
                                    <button>Submit</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            $count++; 
                            }
                        ?>
                    </table>
                        
                    </table>
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