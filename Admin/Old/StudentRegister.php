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
    <link rel="stylesheet" href="StyleRR.css">

    <!-- FontAwesome for icon -->
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
        <div class="container">
            <fieldset>
                <legend>
                    Student Registration
                </legend>
                
                <form action="StudentRegisterProcess.php" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <i class="fa fa-address-card"></i>
                            <span class="details">First Name</span>
                            <input type="text" 
                                   placeholder="Enter student first name"
                                   name="firstName"
                                   required>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-address-card"></i>
                            <span class="details">Last Name</span>
                            <input type="text" 
                                   placeholder="Enter student last name"
                                   name="lastName"
                                   required>
                        </div>

                        <div class="input-box">
                            <i class="fa fa-solid fa-id-badge"></i>
                            <span class="details">Student ID</span>
                            <input type="text" 
                                   placeholder="Enter student ID"
                                   name="studID"
                                   required>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-envelope"></i>
                            <span class="details">Email</span>
                            <input type="text" 
                                   placeholder="Enter student educational email"
                                   name="email"
                                   required>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-home"></i>
                            <span class="details">Address</span>
                            <input type="text" 
                                   placeholder="Enter student Address"
                                   name="address"
                                   required>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-phone"></i>
                            <span class="details">Phone number</span>
                            <input type="text" 
                                   placeholder="Enter student phone number"
                                   name="phoneNum"
                                   required>
                        </div>

                        <div class="input-box">
                            <i class="fa fa-key"></i>
                            <span class="details">Room number</span><br>
                            <select name="roomNum" required>
                                <option value="" disabled selected hidden>Select room</option>
                                <?php
                                    $sql = "SELECT * FROM room";
                                    $query = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $row["roomID"]; ?>">
                                        <?php echo $row["roomID"]; ?>
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-calendar"></i>
                            <span class="details">Check-in date</span>
                            <input type="date"
                                   name="checkIn"
                                   required>
                        </div>
                    </div>
                    
                    <!--<div class="room-details">
                        <input type="radio" name="room" id="dot-1" value="2 person room">
                        <input type="radio" name="room" id="dot-2" value="4 person room">
                        <input type="radio" name="room" id="dot-3" value="8 person room">
                        <i class="fa fa-bed"></i>
                        <span class="room-type">Room type</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="room">2 Person Room</span>
                            </label>
                            
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="room">4 Person Room</span>
                            </label>
                            
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="room">8 Person Room</span>
                            </label>
                        </div>
                    </div>-->
                    
                    <div class="button">
                        <input type="submit" value="Register" name="registerStud" id="registerStud">
                    </div>
                </form>
            </fieldset>
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