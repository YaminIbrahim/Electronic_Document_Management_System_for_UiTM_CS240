<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Melati Hostel Registration System</title>

    <!-- favicon -->
    <link rel="website icon" type="png" href="/Melati HRS/images/favicon.png">

    <!-- Link CSS file -->
    <link rel="stylesheet" href="StyleRecord.css">

    <!-- FontAwesome for icon -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.3/css/all.min.css">-->
    <script src="https://kit.fontawesome.com/2fcc26b571.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- import database connection file -->
    <?php 
        include("../Dbconn.php"); 
    ?>
</head>

<body>
    <!-- navigation bar -->
    <nav>
        <ul>
            <li>
                <a href="Home.php" class="logo">
                    <img src="/Melati HRS/images/Melati Round.png" alt="melati logo"><br>
                    <span class="nav-item"> Melati HRS </span>
                </a>
            </li>
            
            <hr>

            <p class="title"> Hostel </p>

            <hr>
            
            <!-- Hostel Information -->
            <li>
                <a href="Home.php" class="menu-list">
                    <i class="fas fa-solid fa-house"></i>
                    <span class="nav-item"> Home </span>
                </a>
            </li>
            
            <!-- link for rule page -->
            <li>
                <a href="Rule.php" class="menu-list">
                    <i class="fas fa-balance-scale"></i>
                    <span class="nav-item"> Hostel Rule </span>
                </a>
            </li>

            <!-- link for About Us page -->
            <li>
                <a href="About.php" class="menu-list">
                    <i class="fas fa-solid fa-circle-info"></i>
                    <span class="nav-item"> About Us </span>
                </a>
            </li>

            
            <!-- link for Contact Us page -->
            <li>
                <a href="Contact.php" class="menu-list">
                    <i class=" fas fa-solid fa-location-dot"></i>
                    <span class="nav-item"> Contact Us </span>
                </a>
            </li>
            
            <hr>

            <p class="title"> Features </p>

            <hr>
            
            <!-- System features -->
            <div class="box">
                <!-- link for student record -->
                <li>
                    <a href="Student.php" class="menu-list">
                        <i class="fas fa-solid fa-book"></i>
                        <span class="nav-item"> Student record </span>
                    </a>
                </li>
                
                <!-- link for student registration -->
                <li>
                    <a href="StudentRegister.php" class="menu-list">
                        <i class="fas fa-solid fa-bed"></i>
                        <span class="nav-item"> Student register </span>
                    </a>
                </li>
                
                <!-- link for list of room -->
                <li>
                    <a href="Room.php" class="menu-list">
                        <i class="fas fa-solid fa-book-bookmark"></i>
                        <span class="nav-item"> Room record </span>
                    </a>
                </li>

                <!-- link for room register -->
                <li>
                    <a href="RoomAdd.php" class="menu-list">
                        <i class="fas fa-solid fa-building"></i>
                        <span class="nav-item"> Room register </span>
                    </a>
                </li>
            </div>
            
            <!-- logout button -->
            <li>
                <a onclick="out()" href="/Melati HRS/Logout.php" class="menu-list logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item"> Logout </span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="contentBox">
        <div class="topbar">
            <!-- MHRS box -->
            <div class="welcomeBox">
                <p>Melati Hostel Registration System</p>
            </div>

            <!-- User name and DP -->
            <div class="user">
                <div class="username">
                    <!--retrieve user information via session-->
                    <?php
                        if (isset($_SESSION["log"]) && ($_SESSION["log"] == 2)) {
                            echo '<p class="name">' . $_SESSION["staff_fname"] . ' ' . $_SESSION["staff_lname"] .'</p>';
                            echo '<p class="email">' . $_SESSION["staff_email"] .'</p>';
                        }
                        else
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Login.php\"/>";
                    ?>
                </div>
                <div class="userDP">
                    <img src="/Melati HRS/images/userdp.png" alt="Profile picture">
                </div>
            </div>
        </div>

        <!-- Search process -->
        <?php
            $txtSearch = "";
            if (isset($_POST['search'])) {
                $txtSearch = $_POST['roomSearch'];
            }

            $sql = "SELECT * FROM ROOM WHERE roomID LIKE '" .$txtSearch. "%'";
            $query = mysqli_query($connection, $sql) or die("Search not found");
        ?>

        <div class="mainBox">
            <!-- Search box -->
            <div class="searchBox">
                <div class="cari">
                    <form class="formSearch" action="Room.php" method="POST">
                    <!-- Search input -->
                    <input class="searchInput" type="text" name="roomSearch" size="10" maxlength="10" placeholder="Enter room ID">

                    <!-- Submit button as icon -->
                    <button type="submit" name="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                </div>

                <div class="pergi">
                    <button onclick="document.location='RoomAdd.php'">Add new room</button>
                </div>
            </div>

            <div class="firstBox">
                <!-- List of room in table-->
                <table>
                    <tr>
                        <th>no</th>
                        <th>room number</th>
                        <th>room floo</th>
                        <th>room block</th>
                        <th>room available</th>
                        <th>room type</th>
                        <th>action</th>
                    </tr>

                    <?php
                        /*$countAvail = 0;
                        $queryA = "SELECT roomID, COUNT(*) FROM register";
                        $resultA = mysqli_query($connection, $queryA);


                        while ($row = mysqli_fetch_assoc($resultA)) {
                              // Get the room number and the count of available beds
                              $room_count = $row["roomID"];
                              $available_beds = $row["COUNT(*)"];

                              // Output the room number and the count of available beds
                              echo "Room " . $room_count . " has " . $available_beds . " available bed(s)<br>";
                        }*/


                        //count "NO" in column
                        $count = 1;
                        while ($row= mysqli_fetch_array($query)) {
                    ?>

                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row["roomID"] ?></td>
                        <td><?php echo $row["roomFloor"] ?></td>
                        <td><?php echo $row["roomBlock"] ?></td>
                        <td><?php echo $row["roomAvail"] ?></td>
                        <td><?php echo $row["roomType"] ?></td>
                        <td>
                            <a class="edit" href="RoomRegister.php?roomID=<?php echo $row["roomID"]; ?>"> Register </a>
                            <br>
                            <a class="edit" href="RoomEdit.php?roomID=<?php echo $row["roomID"]; ?>"> Edit </a>
                            <br>
                            <a class="delete" href="RoomDelete.php?roomID=<?php echo $row["roomID"]; ?>"> Delete </a>
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

    <!-- Error prevention for logout -->
    <script type="text/javascript">
        function out() {
            var result = confirm('Are you sure to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>