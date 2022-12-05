<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student review</title>
	
	<!-- Favicon -->   
	<link href="img/icon.png" rel="shortcut icon"/>

	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
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
								$clgid=$_REQUEST['id'];
								if(isset($_SESSION['studentid']))
								{
									require_once("connection.php");
									$id=$_SESSION['studentid'];
									$query="SELECT * FROM `student_details` WHERE studentid='$id' and collegeid='$clgid' and approved=1;";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
								        	$fname=$row['fname'];
								        	$lname=$row['lname'];
								        	$profileimg=$row['img'];
								    	}
									}
									else
									{
										header("location:collegedetails.php?id=$clgid&stu-write-rev=failed");
									}

									?>
									<div class="profile-icon">
									<img src=" <?php echo($profileimg) ?> ">
									<div class="dropdown">

									<?php
									echo "<p>$fname $lname <i class='fa fa-caret-down'></i></p>";
								}
								else
								{
									header("location:collegedetails.php?id=$clgid&write-rev=failed");	
								}
							?>
							  <div class="dropdown-content">
							  <a href="student_accountinfo.php">Account info</a>
							  <a href="logout.php">Log out</a>
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
				<span>Write review</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

<!-- Page -->

<div>
			<div class="register-form-warp">
				
				<form class="register-form animate"  style="margin-top: 8px;" action="writereview_ac.php" method="POST">

					<textarea placeholder="Write reviews here..." rows="3" name="reviews" required="required"></textarea>

					<h3>Rate</h3>	

					<div class="stars">

						  <input type="text" name="clgid" style="display: none" value="<?php $id=$_REQUEST['id']; echo($id);?>">
					    
					      <div style="margin-right: -100px; margin-top: -53px;">
						      <input class="star star-5" id="star-5-2" type="radio" name="star" value="5" required="required" />
						      <label class="star star-5" for="star-5-2"></label>
						      <input class="star star-4" id="star-4-2" type="radio" name="star" value="4" />
						      <label class="star star-4" for="star-4-2"></label>
						      <input class="star star-3" id="star-3-2" type="radio" name="star" value="3" />
						      <label class="star star-3" for="star-3-2"></label>
						      <input class="star star-2" id="star-2-2" type="radio" name="star" value="2" />
						      <label class="star star-2" for="star-2-2"></label>
						      <input class="star star-1" id="star-1-2" type="radio" name="star" value="1" />
						      <label class="star star-1" for="star-1-2"></label>
					      </div>

					      <input class="site-btn" type="submit" name="Submit" value="Submit">
					    
					 </div>
							
				</form>
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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-46156385-1', 'cssscript.com');
	  ga('send', 'pageview');

	</script>
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