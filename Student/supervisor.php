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
            <?php 
            $x = "SELECT studSV FROM student WHERE studID = '".$_SESSION['stud_id']."'";
            $xx = mysqli_query ($connection, $x);
            $xxx = mysqli_fetch_array ($xx);

            ?>
            <!--page title-->
            <h1 class="title">Supervisor</h1>

            <!--path-->
            <ul class="breadcrumbs">
                <li><a href="Home.php">Supervisor</a></li>
                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>
                <li><a href="Home.php" class="active">...</a></li>
            </ul>

            <br>

            <div class="titleContentWButton">
                <!--header content for forms and rubics list-->
                <h1 class="titleContent">Supervisor detail</h1>

                <!--add document button-->
                <button class="addBtn" onclick="location.href='supervisorRequest.php'" type="button">
                    Request supervisor
                </button>
                
            </div>           

            <!--content for class list-->
                <div class="data">

                    <?php
                // Supervisor is assigned, retrieve lecturer details from the database
            $lect_id = $xxx['studSV'];

            // Query to select lecturer data from the database
            $sql = "SELECT * FROM lecturer WHERE lectID = '$lect_id'";
            $query = mysqli_query($connection, $sql) or die("not found");
            $row = mysqli_fetch_array($query);

            // Count NO (not sure what this is used for, so leaving it as is)
            $count = 1;
                    ?>

                    <!--Class list data-->
                    <div class="content-data">

                        <div class="titleContentWButton">
                            <!--header content for forms and rubics list-->
                            <h1 class="titleContent">Lecturer details</h1>

                            <!--add document button-->
                        <!--<button class="addBtn" onclick="location.href='addLecturer.php'" type="button">
                            Add Lecturer
                        </button>-->
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
                                    value="<?php echo $row["lectID"]; ?>" 
                                    required
                                    readonly>
                                </div>
                                
                                <div class="input-box">
                                    <i class="fa fa-solid fa-id-card"></i>
                                    <span class="details">First Name</span>

                                    <input type="text" 
                                    placeholder="Enter your first name"
                                    name="name"
                                    value="<?php echo $row["lectName"]; ?>" 
                                    required
                                    readonly>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-envelope' ></i>
                                    <span class="details">Email Address</span>

                                    <input type="text" 
                                    placeholder="Enter your email address"
                                    name="email"
                                    value="<?php echo $row["lectEmail"]; ?>" 
                                    required
                                    readonly>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-envelope' ></i>
                                    <span class="details">UiTM Ouriginal Email Address</span>

                                    <input type="text" 
                                    placeholder="Enter your email address"
                                    name="emailOuriginal"
                                    required
                                    value="<?php echo $row["lectOuriginalEmail"]; ?>" 
                                    readonly>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-phone' ></i>
                                    <span class="details">Phone Number</span>

                                    <input type="text" 
                                    placeholder="Enter your phone number"
                                    name="phoneNum"
                                    value="<?php echo $row["lectPhoneNum"]; ?>" 
                                    required
                                    readonly>
                                </div>

                                <div class="input-box">
                                    <i class='bx bxs-building-house' ></i>
                                    <span class="details">Room Number</span>

                                    <input type="text" 
                                    placeholder="Enter your room number"
                                    name="roomNum"
                                    value="<?php echo $row["lectRoomNum"]; ?>" 
                                    required
                                    readonly>
                                </div>
                                
                            </div>
                        </form>
                    </fieldset>
                </div>            
        </main>
    </section>

    <!--link chart-->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--Link JS file-->
    <script src="script.js"></script>
</body>
</html>