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
            <li><a href="supervisor.php" class="active"><i class='bx bx-user-pin icon'></i> Supervisor </a></li>

            <!--Add request link-->
            <li><a href="docSubmit.php"><i class='bx bx-file-blank icon'></i> Document submission </a></li>

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
                if (isset($_SESSION["log"]) && ($_SESSION["log"] == 1)) {
                    ?>

                    <!--user fullname-->
                    <div class="userFullName">
                        <p><?php echo $_SESSION["stud_name"]?></p>
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
            <h1 class="title">Supervisor</h1>

            <!--path-->
            <ul class="breadcrumbs">
                <li><a href="Home.php">Supervisor</a></li>
                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>
                <li><a href="Home.php" class="active">Supervisor Request</a></li>
            </ul>

            <br>

            <div class="titleContentWButton">
                <!--header content for forms and rubics list-->
                <h1 class="titleContent">Supervisor Request form</h1>
            </div>

            <!--content for class list-->
            <div class="data">
                <?php
                //SELECT `studID`, `studFName`, `studLName`, `studEmail`, `studPassword`, `studPhoneNum`, `studSV`, `studExam`, `classID` FROM `student` WHERE 1

                //query to select all student data from database
                $sql = "SELECT * FROM student WHERE studID = '".$_SESSION['stud_id']."'";
                $query = mysqli_query($connection, $sql) or die("not found");
                $row= mysqli_fetch_array($query);

                //count NO
                $count = 1;
                ?>

                <!--Class list data-->
                <div class="content-data">
                    <table>
                        <tr>
                            <th>no</th>
                            <th>student id</th>
                            <th>full name</th>
                            <th>fyp title</th>
                            <th>select Lecturer</th>
                        </tr>
<form action="supervisorRequestProcess.php" method="POST">
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['studID'] ?></td>
                            <td><?php echo $row['studName'] ?></td>
                            <td>
                                <input type="text" name="fyptitle" id="fyptitle" required>
                            </td>
                            <td class="chooseLect">
                            <?php 
                            // Query to select all lecturer data from the database
                            $lecturerQuery = mysqli_query($connection, "SELECT * FROM lecturer");
                            $adminQuery = mysqli_query($connection, "SELECT adminID, adminName FROM admin"); // Select only the necessary columns from admin table
                            ?>

                            
                                <select class="chooseLectName" name="sv" required>
                                    <option value="" disabled selected hidden>Select supervisor</option>

                                    <?php 
                                    while ($data = mysqli_fetch_array($lecturerQuery)) {
                                    ?>
                                    <option value="<?php echo $data["lectID"]; ?>">
                                        <?php echo $data["lectName"]; ?>
                                    </option>
                                    <?php } ?>

                                    <!-- Add options for admin names -->
                                    <?php 
                                    while ($adminData = mysqli_fetch_array($adminQuery)) {
                                    ?>
                                    <option value="<?php echo $adminData["adminID"]; ?>">
                                        <?php echo $adminData["adminName"]; ?>
                                    </option>
                                    <?php } ?>
                                </select>

                                <input type="text" name="studID" id="studID" value="<?php $_SESSION['stud_id'] ?>" hidden>
                                    
                                <input type="submit" name="submit" id="submit">
                            </form>
                        </td>
                        </tr>
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