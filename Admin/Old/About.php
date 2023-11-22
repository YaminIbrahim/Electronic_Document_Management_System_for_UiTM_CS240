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
                    <h2 class="info">About Us</h2>
                </div>
                
                <hr>

                <p>College Melati began operating on November 15, 2002 to provide welfare services to female students in both physical and spiritual aspects. The importance of College Melati is more clearly seen when there is ACT 174, also known as the Act of Educational Institutions (Boarding College Review Act 1991). The actual concept of boarding college is based on the philosophy of UiTM with the goal of providing comfortable facilities and food to all college residents in order to become excellent students in academic fields and other aspects of daily life.</p><br>

                <hr>

                <div class="info">
                    <h2 class="info">Staff Directory</h2>
                </div>
                
                <hr>

                <!-- photo gallery -->
                <div class="photo">
                    <div class="gallery">
                        <img src="/Melati HRS/images/Pengetua.png" alt="Pengetua">
                        <p class="desc">
                            <b>Prof Madya Dr Nor Aizam Adnan</b><br>
                            Pengetua<br>
                            (+603) 5544 3961<br>
                            nor_aizam@uitm.edu.my
                        </p>
                    </div>
                    
                    <div class="gallery">
                        <img src="/Melati HRS/images/Penolong Pendaftar Kanan.png" alt="Penolong Pendaftar Kanan">
                        <p class="desc">
                            <b>Zaiti Noreen Rosli</b><br>
                            Penolong Pendaftar Kanan<br>
                            (+603) 5544 3949<br>
                            zaiti.noreen@uitm.edu.my
                        </p>
                    </div>

                    <div class="gallery">
                        <img src="/Melati HRS/images/Penolong Pengurus Asrama Tertinggi.png" alt="Penolong Pengurus Asrama Tertinggi">
                        <p class="desc">
                            <b>Zalina Khalid</b><br>
                            Penolong Pengurus Asrama<br>
                            (+603) 5544 3949<br>
                            zalinakhalid@uitm.edu.my
                        </p>
                    </div>

                    <div class="gallery">
                        <img src="/Melati HRS/images/Penolong Pengurus Asrama Kanan.png" alt="Penolong Pengurus Asrama Kanan">
                        <p class="desc">
                            <b>Siti Roha Kamila Torhim</b><br>
                            Penolong Pengurus Asrama Kanan<br>
                            (+603) 5544 3931<br>
                            roha@uitm.edu.my
                        </p>
                    </div>

                    <div class="gallery">
                        <img src="/Melati HRS/images/Penyelia Asrama Kanan.png" alt="Penyelia Asrama Kanan">
                        <p class="desc">
                            <b>Nur Fadiah Izzati Mohd Darus</b><br>
                            Penyelia Asrama Kanan<br>
                            (+603) 5544 3566<br>
                            fadiahizzati@uitm.edu.my
                        </p>
                    </div>

                    <div class="gallery">
                        <img src="/Melati HRS/images/Penyelia Asrama.png" alt="Penyelia Asrama">
                        <p class="desc">
                            <b>Zaharah Abdul Rahman</b><br>
                            Penyelia Asrama Kanan<br>
                            (+603) 5544 3566<br>
                            zaharah225@uitm.edu.my
                        </p>
                    </div>
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