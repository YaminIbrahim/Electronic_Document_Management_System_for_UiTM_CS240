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
    <link rel="stylesheet" href="styleHome.css">

    <!-- FontAwesome for icon -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.3/css/all.min.css">-->
    <script src="https://kit.fontawesome.com/2fcc26b571.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <div class="mainBox">
            <div class="firstBox">
                <hr>

                <div class="info">
                    <h2 class="info" id="rule">Hostel Rule</h2>
                </div>
                
                <hr>
                
                <div class="P-Desc">
                    <p>
                        <h2>1.0 DRESS CODE FOR STUDENTS</h2><br>
                        <h3>1.1 FEMALE STUDENTS</h3><br>
                        <b style="font-size: 18px">i) During Office Hours (8.00am -5.00pm) –Weekdays (Monday-Friday), Study Break and Examination</b><br>
                            <i class="fa fa-angle-right"></i>  Formal- long/short sleeve shirt (tucked in ) with tie and slacks<br>
                            <i class="fa fa-angle-right"></i>  Jeans are allowed but must not be faded or tattered<br>
                            <i class="fa fa-angle-right"></i>  No sagging or cargo pants allowed<br>
                            <i class="fa fa-angle-right"></i>  Traditional attire is allowed on Fridays only<br>
                            <i class="fa fa-angle-right"></i>  Sandals/slippers are not allowed<br>
                            <i class="fa fa-angle-right"></i>  Collarless T-shirts are not allowed
                            
                        <br><br>
                            
                        <b style="font-size: 18px">ii) After Office Hours (5pm onwards-Monday to Friday: Saturday, Sunday and Public Holiday)</b><br>
                            <i class="fa fa-angle-right"></i>  If there are classes, official functions, seminars or meetings, students must be formally dressed as in 1.1(i)<br>
                            <i class="fa fa-angle-right"></i>  Collarless T-shirts, shorts, sandals or slippers (only dinner at cafeteria and field)
                            
                        <br><br>
                            
                        <b style="font-size: 18px">iii) Hairstyle</b><br>
                        <i class="fa fa-angle-right"></i>  Short, collar length is allowed<br>
                        <i class="fa fa-angle-right"></i>  Hair not to bleached/dyed in extreme colours<br>
                        <i class="fa fa-angle-right"></i>  No punk styles
                            
                        <br><br>
                            
                        <b style="font-size: 18px">iv) Earrings</b><br>
                        <i class="fa fa-angle-right"></i>  Earrings or ear studs of any form or type, bangles (except for students of Sikh faith), wrist
                        chains and long chains are not allowed in the Hostel or campus grounds. <br>
                        <i class="fa fa-angle-right"></i>  Tattoos of any form or type are not allowed.<br>
                    </p>
                </div>
            </div>

            <div class="secondBox">
                <h2>Melati Social Media</h2>

                <!-- youtube link -->
                <div class="card">
                    <img src="/Melati HRS/images/youtube.png" alt="Melati TV Official">
                    <p class="socialDesc">Visit us at our Youtube channel</p>
                    <p class="social">@Melati TV Official</p>
                    <button class="visit" type="button" onclick="location.href='https://www.youtube.com/@MelatiTVOfficial/featured'">
                        <span class="button-text">Visit Us!</span>
                    </button>
                </div>

                <br>

                <!-- instagram link -->
                <div class="card">
                    <img src="/Melati HRS/images/instagram.png" alt="Melati instagram">
                    <p class="socialDesc">Visit us at our Instagram</p>
                    <p class="social">@kolejmelati</p>
                    <button class="visit" type="button" onclick="location.href='https://www.instagram.com/kolejmelati/?hl=en'">
                        <span class="button-text">Visit Us!</span>
                    </button>
                </div>

                <br>

                <!-- facebook link -->
                <div class="card">
                    <img src="/Melati HRS/images/facebook.png" alt="Melati instagram">
                    <p class="socialDesc">Visit us at our Facebook page</p>
                    <p class="social">@Kolej Melati Uitm Shah Alam</p>
                    <button class="visit" type="button" onclick="location.href='https://www.facebook.com/KolejMelatiSAlam/?locale=ms_MY'">
                        <span class="button-text">Visit Us!</span>
                    </button>
                </div>
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