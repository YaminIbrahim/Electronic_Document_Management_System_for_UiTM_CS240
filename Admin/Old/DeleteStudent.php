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
        <?php
            if (isset($_GET['studID'])) {
                $stud_id = $_GET['studID'];

                //$sql = "SELECT * FROM student WHERE studID = '" . $stud_id . "'";

                $sql = "SELECT *
                        FROM student
                        JOIN register ON student.studID = register.studID
                        JOIN room ON register.roomID = room.roomID
                        WHERE student.studID = '" .$stud_id. "'";

                $query = mysqli_query($connection, $sql) or die("Query Fail");
                $data = mysqli_fetch_array($query);
        ?>

        <div class="container">
            <fieldset>
                <legend>
                    Student Registration
                </legend>
                
                <form action="DeleteStudentProcess.php" method="POST">
                    <div class="user-details">
                        
                        <!-- readonly for read only -->
                        <div class="input-box">
                            <i class="fa fa-address-card"></i>
                            <span class="details">First Name</span>
                            <input type="text" 
                                   placeholder="Enter student first name"
                                   name="firstName"
                                   required
                                   value="<?php echo $data["studFname"]; ?>"
                                   disabled>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-address-card"></i>
                            <span class="details">Last Name</span>
                            <input type="text" 
                                   placeholder="Enter student last name"
                                   name="lastName"
                                   required
                                   value="<?php echo $data["studLname"]; ?>"
                                   disabled>
                        </div>

                        <div class="input-box">
                            <i class="fa fa-solid fa-id-badge"></i>
                            <span class="details">Student ID</span>
                            <input type="text" 
                                   placeholder="Enter student ID"
                                   name="studID"
                                   id="studID"
                                   required
                                   value="<?php echo $data["studID"]; ?>" 
                                   readonly>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-envelope"></i>
                            <span class="details">Email</span>
                            <input type="text" 
                                   placeholder="Enter student educational email"
                                   name="email"
                                   required
                                   value="<?php echo $data["studEmail"]; ?>"
                                   disabled>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-home"></i>
                            <span class="details">Address</span>
                            <input type="text" 
                                   placeholder="Enter student Address"
                                   name="address"
                                   required
                                   value="<?php echo $data["studAddr"]; ?>"
                                   disabled>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-phone"></i>
                            <span class="details">Phone number</span>
                            <input type="text" 
                                   placeholder="Enter student phone number"
                                   name="phoneNum"
                                   required
                                   value="<?php echo $data["studPhoneNum"]; ?>"
                                   disabled>
                        </div>
                        
                        <div class="input-box">
                            <i class="fa fa-key"></i>
                            <span class="details">Room number</span><br>
                            <select name="roomNum" required disabled>
                                <option value="" disabled selected hidden>Select room</option>
                                <?php
                                    $sql = "SELECT * FROM ROOM";
                                    $query = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $row["roomID"]; ?>"
                                        <?php
                                            if ($data["roomID"] == $row["roomID"]) { 
                                                echo "selected";
                                            } 
                                        ?>
                                        >
                                        <?php 
                                            echo $row["roomID"];
                                        ?>
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
                                   required
                                   value="<?php echo $data["regisDate"]; ?>"
                                   disabled>
                        </div>
                    </div>
                    
                    <!--<div class="room-details">
                        <input type="radio" name="room" id="dot-1" value="2 person room" <?php if ($data['roomType'] == '2') { echo 'checked'; } ?> disabled>
                        <input type="radio" name="room" id="dot-2" value="4 person room" <?php if ($data['roomType'] == '4') { echo 'checked'; } ?> disabled>
                        <input type="radio" name="room" id="dot-3" value="8 person room" <?php if ($data['roomType'] == '8') { echo 'checked'; } ?> disabled>

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

                    <!--<script type ="text/javascript" >
                        var aCheck;
                        var bCheck;
                        var cCheck;
                        
                        function check(){
                            aCheck=document.getElementById ("dot-1").checked;
                            bCheck=document.getElementById ("dot-2").checked;
                            cCheck=document.getElementById ("dot-3").checked;
                        }

                        function unchange(){
                            document.getElementById ("dot-1").checked=aCheck;
                            document.getElementById ("dot-2").checked=bCheck;
                            document.getElementById ("dot-3").checked=cCheck;
                        }
                    </script> -->
                    
                    <div class="button">
                        <input onclick="
                        var deleteData = confirm('Are you sure to delete the ' + <?php echo $data["studID"]; ?> + ' data');
                        if (deleteData == false) {
                            event.preventDefault();
                        }
                        " type="submit" value="Delete" name="deleteStud" id="deleteStud">
                    </div>
                </form>
            </fieldset>
        </div>

        <?php
            } else {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=Student.php\"/>";
            }
        ?>
    </div>

    <!-- User error prevention -->
    <script type="text/javascript">
        function out() {
            var result = confirm('Are you sure to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>

    <script>
        function deleteStud() {
            var key = document.getElementById("studID");

            var deleteData = confirm('Are you sure to delete the ' + key + ' data');
            if (deleteData == false) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>