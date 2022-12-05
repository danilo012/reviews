<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student review</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/icon.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" media="all" type="text/css" href="css/style.css?v=<?php echo time(); ?>"/>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->

	<?php
		if(isset($_REQUEST['pass-suc']))
		{
		    ?>
								<div id="id010" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6 style="color: green">Your password changed successfully!</h6>
											<div class="okbtn">
												<button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id010').style.display='none'" style="width:auto;">Ok</button>
											</div>
										</div>
									</div>
								</div>		
			<?php
		}
	?>

	<?php
		if(isset($_REQUEST['edit-suc']))
		{
		    ?>
								<div id="id010" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6 style="color: green">Your details edited successfully!</h6>
											<div class="okbtn">
												<button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id010').style.display='none'" style="width:auto;">Ok</button>
											</div>
										</div>
									</div>
								</div>		
			<?php
		}
	?>

	<?php
		if(isset($_REQUEST['upload-suc']))
		{
		    ?>
								<div id="id010" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6 style="color: green">Image uploaded successfully!</h6>
											<div class="okbtn">
												<button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id010').style.display='none'" style="width:auto;">Ok</button>
											</div>
										</div>
									</div>
								</div>		
			<?php
		}
	?>

	<?php
		if(isset($_REQUEST['upload-fail']))
		{
		    ?>
								<div id="id010" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6>Sorry, your file was not uploaded!</h6>
											<div class="okbtn">
												<button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id010').style.display='none'" style="width:auto;">Ok</button>
											</div>
										</div>
									</div>
								</div>		
			<?php
		}
	?>

	<?php
		if(isset($_REQUEST['wrong-format']))
		{
		    ?>
								<div id="id010" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6>Sorry, only JPG, JPEG, PNG & GIF files are allowed!</h6>
											<div class="okbtn">
												<button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id010').style.display='none'" style="width:auto;">Ok</button>
											</div>
										</div>
									</div>
								</div>		
			<?php
		}
	?>

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
								if(isset($_SESSION['studentid']))
								{
									require_once("connection.php");
									$id=$_SESSION['studentid'];
									$query="SELECT * FROM `student_details` WHERE studentid='$id'";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
											$email=$row['email'];
								        	$fname=$row['fname'];
								        	$lname=$row['lname'];
								        	$enno=$row['enno'];
								        	$mo=$row['mobno'];
								        	$addr=$row['address'];
								        	$profileimg=$row['img'];
								    	}
									}
									require_once("closeconnection.php");

									?>
									<div class="profile-icon">
									<img src=" <?php echo($profileimg) ?> ">
									<div class="dropdown">

									<?php

									echo "<p>$fname $lname <i class='fa fa-caret-down'></i></p>";
								}
								else
								{
									header('location:index.php');
								}
								
							?>


							  <div class="dropdown-content">
							  <a href="student_accountinfo.php">Account info</a>
							  <a href="logout.php">Log out</a>
							  </div>
							</div>
					</div>
					  		
					<nav class="main-menu">
						<ul>
							<?php
								if(isset($_SESSION['collegeid']))
								{
									?>
									<li><a href="index.php">Home</a></li>
									<?php
								}
								else
								{
									?>
									<li style="margin-left: 60px;"><a href="index.php">Home</a></li>
									<?php
								}
							?>
							<li><a href="findcollege.php">Find college</a></li>

							<?php
								if(isset($_SESSION['collegeid']))
								{
									?>
									<div class="manage-dropdown">
									<p><li><a href="">Manage details&nbsp;<i class='fa fa-caret-down'></i></a></li></p>
										<div class="manage-dropdown-content">
										    <a href="addcourse.php">Add courses</a>
										    <a href="managestudent.php">Manage student</a>
									  	</div>
								  	</div>
									<?php
								}
							?>

							<li><a href="aboutus.php">About us</a></li>
							<li><a href="contactus.php">Contact us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Page info -->
	<div class="page-info-section-register set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>Profile</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

<!-- Page -->

<div class="profile-warp">
	
	<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                    	<form action="stuprofile_upload_ac.php" method="POST" enctype="multipart/form-data">
                    		
                    		<div class="profile-img">
                            <img src="<?php echo($profileimg) ?>">
                            <div class="file btn btn-lg btn-primary">
                                Choose image
                                <input type="file" name="filetoupload" required="required" />
                            </div>
							<input type="submit" class="file btn btn-lg btn-primary" name="upload" value="Upload">
                        	</div>	

                    	</form>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <?php
                                    	echo "<h5>$fname $lname</h5>";
                                    ?>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                            	<?php
								            if(isset($_REQUEST['pass-fail']))
								            {
								              ?>
								               <li class="nav-item">
				                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
				                                </li>
				                                <li class="nav-item">
				                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Change password</a>
				                                </li>
								              <?php
								            }
								            else
								            {
								            	?>
								            	<li class="nav-item">
				                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
				                                </li>
				                                <li class="nav-item">
				                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Change password</a>
				                                </li>
								            	<?php
								            }
								?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    	<button class="profile-edit-btn"><a href="stu_edit_profile.php" style="color: white;">Edit Profile</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent" >

								<?php
								            if(isset($_REQUEST['pass-fail']))
								            {
								                ?>
								                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
								                <?php
								            }
								            else
								            {
								            	?>
								            	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								            	<?php
								            }
								?>                        	 
										<div style="margin-top: -100px;"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	echo "<p>$email</p>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>First name</label>
                                            </div>
                                            <div class="col-md-6">
												<?php
                                                	echo "<p>$fname</p>";
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Last name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	echo "<p>$lname</p>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Enrolment no.</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	echo "<p>$enno</p>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Mobile no.</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	echo "<p>$mo</p>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	echo "<p>$addr</p>";
                                                ?>
                                            </div>
                                        </div>
                            </div>

                            <?php
								            if(isset($_REQUEST['pass-fail']))
								            {
								              	?>
												<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">								              
												<?php
								            }
								            else
								            {
								            	?>
												<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								            	<?php
								            }
							?>
		                        <div class="change-pass-form">
		                        	<div style="margin-top: -100px;"></div>
		                        	<form action="stu_changepass_ac.php" method="POST">
		                        		<?php
								            if(isset($_REQUEST['pass-fail']))
								            {
								              ?>
								              <div style="text-align: center; color: red; float: left;" >
								                Invalid current password!
								              </div>
								              <?php
								            }
								      	?>
	                            		<input type="password" placeholder="Current password" name="cupass" required="required">
		                            	<input type="password" placeholder="New password" name="newpass" required="required">
	       								<input type="submit" class="profile-change-btn" name="btnAddMore" value="Change">
		                            </form>
		                        </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- Page end -->

	<!-- footer section -->

	<div class="pt-5 pb-5 footer m" style="background-image: url('img/bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-xs-12 about-company">
					<img class="flogo" src="img/logo.png">
				  <p class="ic">
				  <a class="icon" href="#"><img class="icon" src="img/social/facebook.png"></a>
				  <a class="icon" href="#"><img class="icon" src="img/social/instagram.png"></a>
				  <a class="icon" href="#"><img class="icon" src="img/social/google.png"></a>
				  </p>
				</div>
				<div class="col-lg-3 col-xs-12 links wfont">
					<h4 class="mt-lg-0 mt-sm-3 wfont2">Links</h4>
					<ul class="m-0 p-0">
						<li><a class="a" href="index.php"><b class="a">Home</b></a></li>
						<li><a class="a" href="findcollege.php"><b class="a">Find College</b></a></li>
						<li><a class="a" href="contactus.php"><b class="a">Contact Us</b></a></li>
						<li><a class="a" href="aboutus.php"><b class="a">About Us</b></a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-xs-12 location wfont">
				  <h4 class="mt-lg-0 mt-sm-4 wfont2"><img class="icon2" src="img/social/location.png"> Location</h4>
				  <p class="wfont">C.U.Shah Government Polytechnic, Wadhawan</p>
				  <p class="mb-0 wfont"><img class="icon2" src="img/social/phone.png"> Mo. 9409765922</p>
				  <p class="wfont"><img class="icon2" src="img/social/email.png"> Email. studentreview2020@gmail.com</p>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col copyright">
				  <p><small class="text-white-50">© 2020. All Rights Reserved.</small></p>
				</div>
			</div>
		</div>
	</div>

	<!-- footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>


	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWTIlluowDL-X4HbYQt3aDw_oi2JP0Krc&sensor=false"></script>
	<script src="js/map.js"></script>
</body>
</html>