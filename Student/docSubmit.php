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
            <li><a href="docSubmit.php" class="active"><i class='bx bx-file-blank icon'></i> Document submission </a></li>


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

            <!--page title-->
            <h1 class="title">Document Submission</h1>

            <!--path-->
            <ul class="breadcrumbs">
                <li><a href="Home.php">Document Submission</a></li>
                <li class="divider"><i class="fa fa-solid fa-angle-right"></i></li>
                <li><a href="Home.php" class="active">...</a></li>
            </ul>                

            <!--content for class list-->
            <div class="data">
                <div class="content-data">
                    <div class="titleContentWButton">
                        <!--header content for forms and rubics list-->
                        <h1 class="titleContent">Document list</h1>
                    </div>



                    <div class="data">
                        <div class="content-data">

                            <fieldset>
                                <legend>
                                    Add document form
                                </legend>

                                <form action="docSubmitProcess.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-details">

                                        <div class="input-box">
                                            <i class="fa-solid fa-hashtag"></i>
                                            <span class="details">Document code</span>


                                            <select name="docType" required>
                                                <option value="" disabled selected hidden>Select document type</option>

                                                <?php
                                                $sqlSelectDocType = "SELECT * FROM doctype";
                                                $querySelectDocType = mysqli_query($connection, $sqlSelectDocType) or die("not found");

                                                while ($selectDocType = mysqli_fetch_array($querySelectDocType)) {
                                                    ?>
                                                    <option value='<?php echo $selectDocType["docCode"]; ?>'>
                                                        <?php echo $selectDocType["docCode"]." - ".$selectDocType["docName"] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="input-box">
                                            <input class="upload-box" type="file" name="docFile" id="docFile" required style="border: 0px; margin-top: 25px;">
                                        </div>

                                        <input type="text" name="studID" id="studID" value='<?php echo $_SESSION['stud_id']; ?>' hidden>

                                        <input type="text" name="uploadBy" id="uploadBy" value='<?php echo $_SESSION['lect_id'] ?>' hidden>

                                    </div>

                                    <div class="button">
                                        <input type="submit" value="Upload" name="uploadDoc" id="uploadDoc">
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>






                    <br>

                    <?php
                    //query
                    $sql = "SELECT * FROM document WHERE uploadBy = '".$_SESSION['stud_id']."'";
                    $query = mysqli_query($connection, $sql) or die("not found");
                    $row= mysqli_fetch_array($query);

                    $sqlDocType = "SELECT * FROM doctype";
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
                                $sqlCheckDoc = "SELECT * FROM document WHERE docCode = '" . $rowDocType["docCode"] . "' AND uploadBy = '" . $_SESSION['stud_id']. "'";

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
                                        <a class="dw" target="_blank" href="docSubmitVDD.php?docView=<?php echo $getDocID["docID"]; ?>&studID=<?php echo $_SESSION['stud_id'] ?>">
                                            <button class="actionBtn">
                                                View
                                            </button>
                                        </a>

                                        <a class="dw" target="_blank" href="docSubmitVDD.php?docDw=<?php echo $getDocID["docID"]; ?>&studID=<?php echo $_SESSION['stud_id'] ?>">
                                            <button class="actionBtn">
                                                Download
                                            </button>
                                        </a>

                                        <a class="dw" href="docSubmitVDD.php?docRemove=<?php echo $getDocID["docID"]; ?>&studID=<?php echo $_SESSION['stud_id'] ?>">
                                            <button class="actionBtn" style="background: red; color: white; border-color: hotpink;">
                                                Remove
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