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
                    <a href="Student.php" class="menu-list">
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
                        if (isset($_SESSION["log"]) && ($_SESSION["log"] == 3)) {
                            echo '<p class="name">' . $_SESSION["admin_fname"] . ' ' . $_SESSION["admin_lname"] .'</p>';
                            echo '<p class="email">' . $_SESSION["admin_email"] .'</p>';
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
                <p class="welcome">Welcome,</p>

                <!--<p class="welcomeName">Firstname Lastname</p>-->
                <?php
                    //call user first name and last name via session
                    echo '<p class="welcomeName">' . $_SESSION["staff_fname"] . ' ' . $_SESSION["staff_lname"] .'</p>';
                ?>

                <p class="intro">Melati hostel is a place where student can stay for short or long periods of time. It provides basic facilities like bathrooms, showers and kitchens, as well as beds and lockers to store personal belongings. A successful hostel management involves making sure that the students are satisfied with their stay. Our hostel consist of one person room, two person room, four person room, and dorm that can fit eight to sixteen person per dorm. Each room category varies in different prices. Pictures below shows a few picture from our hostel facility and room.</p><br>

                <!-- photo gallery -->
                <div class="photo">
                    <div class="gallery">
                        <img src="/Melati HRS/images/hostel1.png" alt="UiTM Melati Hostel">
                        <p class="desc">UiTM Melati Hostel</p>
                    </div>
                    
                    <div class="gallery">
                        <img src="/Melati HRS/images/hostel2.png" alt="UiTM Melati Hostel">
                        <p class="desc">UiTM Melati Hostel</p>
                    </div>
                    
                    <div class="gallery">
                        <img src="/Melati HRS/images/hostel3.png" alt="UiTM Melati Hostel">
                        <p class="desc">UiTM Melati Hostel</p>
                    </div>
                    
                    <div class="gallery">
                        <img src="/Melati HRS/images/hostel4.png" alt="image dorm">
                        <p class="desc">UiTM Melati Hostel Room</p>
                    </div>
                    
                    <div class="gallery">
                        <img src="/Melati HRS/images/hostel5.png" alt="image dorm">
                        <p class="desc">UiTM Melati Hostel Room</p>
                    </div>
                    
                    <div class="gallery">
                        <img src="/Melati HRS/images/hostel6.png" alt="image dorm">
                        <p class="desc">UiTM Melati Hostel Room</p>
                    </div>
                </div>

                <br><hr>
            
                <div class="info">
                    <h2 id="info">Hostel Information</h2>
                </div>
                
                <hr>
                
                <div class="hostelDesc">
                    <p>
                        Hostel Melati, under the management of the Office of International Affairs (OIA), 
                        offers accomodation to UiTM international students and local students (based on availability). Single and married students may 
                        apply for accomodation through Melati Residential College Office Management.<br><br>

                        Hostel Melati begin its operation on 1 February 2008 and the first batch of international students was registered 
                        residents on July Semester 2008. The 11-storey condominium consists of 83 units. Each unit consists of 3 bedrooms, a living area, 
                        a dining area, a kitchen and 2 bathrooms (one bathroom is attached to the master bedroom). The units are fully furnished (a sofa set, 
                        a dining table and chairs, a refrigerator, a shoe rack, a kitchen cabinet) and some rooms are air-conditioned. Each bedrooms are 
                        basically equipped with a bed (single or double), study table with bookshelf, a chair, a cupboard and a clothes hanger.<br><br>

                        Among the other facilities provided are covered car park, 24 hours security service, TV/recreation room, social activity and meeting 
                        rooms, a discussion room, a computer room. Within the vacinity there are convenience store, childrens playground, laundrette and a 
                        surau.<br><br>

                        Hostel Melati is strategically located with 15 minutes walk to UiTM Main Campus. It is closely located to i-City, Wet World Waterpark, 
                        Supermarkets (Giant, AEON, Tesco), Shopping Complexes (PKNS, SACC Mall, Plaza Alam Sentral), Shah Alam Hospital, restaurants, 
                        petrol pump stations, KTM Commuter Station (Padang Jawa) and Section 7 Business Centres amongst others. Kristal residents have an 
                        easy acess to Bukit Raja, Klang and the Federal Highway.<br><br>

                        Kristal Residential College is managed by a manager and assisted by administrative staff and a residence staff cum counselor. 
                        The staff manages the administrative matters and maintenance of the College, while the residence staff focus on students matters and 
                        activities.<br><br>

                        Kristal Residential College places great emphasize on conducive living environment, creating a sense of community and an atmosphere 
                        of cooperation, safety and responsibility.<br><br>
                    </p>
                </div>

                <br><hr>
                    <div class="info">
                    <h2 id="info">Melati TV Official</h2>
                </div>
                <hr>

                <iframe width="100%" height="450px" src="https://www.youtube.com/embed/-w3GnHwmMbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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