<!-- Head Section -->
<?php include_once "head.php" ?>

<body>

    <!-- Preloder Section -->
    <?php include_once "preloder.php" ?>

    <!-- Dialogs Section -->
    <?php include_once "dialogs.php" ?>

    <header class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="site-logo">
                        <img src="img/logo.png" alt="">
                    </div>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">

                    <?php
                    session_start();
                    if (isset($_SESSION['studentid'])) {
                        require_once("connection.php");
                        $id = $_SESSION['studentid'];
                        $query = "SELECT * FROM `student_details` WHERE studentid='$id'";
                        $sql = mysqli_query($con, $query);
                        if (mysqli_num_rows($sql) > 0) {
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $profileimg = $row['img'];
                            }
                        }

                    ?>

                        <div class="profile-icon">
                            <img src="<?php echo ($profileimg) ?>">
                            <div class="dropdown">

                                <p><?php echo "$fname $lname "; ?><i class='fa fa-caret-down'></i></p>

                                <div class="dropdown-content">
                                    <a href="student_accountinfo.php">Account info</a>
                                    <a href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>

                    <?php
                    } else if (isset($_SESSION['collegeid'])) {
                        require_once("connection.php");
                        $id = $_SESSION['collegeid'];
                        $query = "SELECT * FROM `college_info` WHERE collegeid='$id'";
                        $sql = mysqli_query($con, $query);
                        if (mysqli_num_rows($sql) > 0) {
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $clgname = $row['collegename'];
                                $profileimg = $row['img'];
                            }
                        }

                    ?>

                        <div class="profile-icon">
                            <img src="<?php echo ($profileimg) ?>">
                            <div class="dropdown">

                                <p style="margin-left: -20px;"><i class='fa fa-caret-down'></i></p>
                                <p class="uname-overflow-hidden"><?php echo "$clgname"; ?></p>

                                <div class="dropdown-content">
                                    <a href="college_accountinfo.php">Account info</a>
                                    <a href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>

                    <?php
                    } else {
                    ?>
                        <a href="register.php" class="site-btn header-btn">Register</a>
                        <button class="site-btn header-btn" style="margin-right: 10px;" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
                    <?php
                    }
                    ?>

                    <nav class="main-menu">
                        <ul>

                            <?php
                            if (isset($_SESSION['collegeid'])) {
                            ?>
                                <li><a href="index.php">Home</a></li>
                            <?php
                            } else {
                            ?>
                                <li style="margin-left: 60px;"><a href="index.php">Home</a></li>
                            <?php
                            }
                            ?>

                            <li><a href="findcollege.php">Find College</a></li>

                            <?php
                            if (isset($_SESSION['collegeid'])) {
                            ?>
                                <div class="manage-dropdown">
                                    <p>
                                        <li><a href="">Manage Details&nbsp;<i class='fa fa-caret-down'></i></a></li>
                                    </p>
                                    <div class="manage-dropdown-content">
                                        <a href="addcourse.php">Add Courses</a>
                                        <a href="managestudent.php">Manage Student</a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="contactus.php">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Login Section -->
    <?php include_once "login.php" ?>