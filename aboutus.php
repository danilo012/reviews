<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student review</title>
	
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
								        	$fname=$row['fname'];
								        	$lname=$row['lname'];
								        	$profileimg=$row['img'];
								    	}
									}
									require_once("closeconnection.php");

									?>
									<div class="profile-icon">
									<img src="<?php echo($profileimg)?>">
									<div class="dropdown">
									<?php
										echo "<p>$fname $lname <i class='fa fa-caret-down'></i></p>";
									?>
									<div class="dropdown-content">
									    <a href="student_accountinfo.php">Account info</a>
									    <a href="logout.php">Log out</a>
								  	</div>
								  	</div>
									</div>

									<?php
								}
								else if(isset($_SESSION['collegeid']))
								{
									require_once("connection.php");
									$id=$_SESSION['collegeid'];
									$query="SELECT * FROM `college_info` WHERE collegeid='$id'";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
								        	$clgname=$row['collegename'];
								        	$profileimg=$row['img'];
								    	}
									}
									require_once("closeconnection.php");

									?>

									<div class="profile-icon">
									<img src="<?php echo($profileimg)?>">
									<div class="dropdown">
									<p style="margin-left: -20px;"><i class='fa fa-caret-down'></i></p>
									<p class="uname-overflow-hidden"><?php echo"$clgname";?></p>
										<div class="dropdown-content">
											<a href="college_accountinfo.php">Account info</a>
											<a href="logout.php">Log out</a>
										</div>
									</div>
									</div>
									<?php
								}
								else
								{
									?>
									<a href="register.php" class="site-btn header-btn">Register</a>
									<button class="site-btn header-btn" style="margin-right: 10px;" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
									<?php
								}
								
							?>		
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

<!--Login section-->

	<!--Student Login section-->

	<?php
		if(isset($_REQUEST['stu-msg']))
		{
		    ?>
				<div id="id01" class="modal" style="display: block;">  
		<?php
		}
		else
		{
			?>
				<div id="id01" class="modal">
			<?php
		}
	?>


		<div class="login-form">
			<form class="modal-content animate" action="stu_login_ac.php" method="POST">
				<div class="imgcontainer">
				  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				</div>
				<h2>Student Login</h2> 
				  
				<div class="form-group has-error">
					<button class="btn btn-primary btn-lg btn-block navbtn" onclick="document.getElementById('id02').style.display='block', document.getElementById('id01').style.display='none'" style="width:auto;">College Login</button>

					<div class="form-group has-error">
						<input type="email" class="form-control" name="email" placeholder="Email" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="psw" placeholder="Password" required="required">
					</div>

					<?php
			            if(isset($_REQUEST['stu-msg']))
			            {
			              ?>
			              <div style="text-align: center; color: red; margin-bottom: 13px;" >
			                Invalid email and password!
			              </div>
			              <?php
			            }
			      	?>

					<div class="form-group">
						<input type="submit" value="Login" class="btn btn-primary btn-lg btn-block">
					</div>
					<p><a href="#">Lost your Password?</a></p>
				</div>
			</form>
		</div>
	</div>

	<!--Student Login section end-->

	<!--College Login section-->

	<?php
		if(isset($_REQUEST['clg-msg']))
		{
		    ?>
				<div id="id02" class="modal" style="display: block;">  
		<?php
		}
		else
		{
			?>
				<div id="id02" class="modal">
			<?php
		}
	?>

		<div class="login-form">
			<form class="modal-content animate" action="clg_login_ac.php" method="POST">
				<div class="imgcontainer">
				  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				</div>
				<h2>College Login</h2> 
				  
				<div class="form-group has-error">

					<button class="btn btn-primary btn-lg btn-block navbtn" onclick="document.getElementById('id01').style.display='block', document.getElementById('id02').style.display='none' " style="width:auto;">Student Login</button>  
					<div class="form-group has-error">
						<input type="email" class="form-control" name="email" placeholder="Email" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="psw" placeholder="Password" required="required">
					</div>
					
					<?php
			            if(isset($_REQUEST['clg-msg']))
			            {
			              ?>
			              <div style="text-align: center; color: red; margin-bottom: 13px;" >
			                Invalid email and password!
			              </div>
			              <?php
			            }
			      	?>

					<div class="form-group">
						<input type="submit" value="Login" class="btn btn-primary btn-lg btn-block">
					</div>
					<p><a href="#">Lost your Password?</a></p>
			</div>
			</form>
		</div>
	</div>

	<!--College Login section end-->

	<!--Login section end-->

	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>About Us</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- search section -->
	<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Search your college</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form class="intro-newslatter" action="about_search_ac.php" method="POST">

 						<?php
							if(isset($_REQUEST['no-record']))
							{
								?>
 								<input type="text" list="brow" placeholder="No record found..." name="college" required="required">
								<?php
							}
							else
							{
								?>
 								<input type="text" list="brow" placeholder="Search college" name="college" required="required">
								<?php
							}
						?>

							<input type="submit" class="site-btn btn-dark" value="Search college" name="serch">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->



	<!-- Page -->
	<section class="contact-page spad pb-0">
		<div class="container">
				<div>
					<div class="contact-info-area">
						<div class="section-title text-left p-0">
							<h2>About Us</h2>
						</div>
						<ul class="contact-list" >
							<li style="text-align:justify; font-size: 20px;">Student review is simple review website for student. This is a plateform where College can evaluate themself by their students reviews. Here as student you can write review on your college based on that you can inspire other student to study on your college. This website is very helpfull other student to get best college for their course. Here as visiter student you get top ratted college reviewed by their student. Here as college you can register your college and by getting reviews you can evaluate your performance and grow your rank.</li>
						</ul>
						<div class="section-title text-left p-0">
							<h2 style="margin-top: 80px">Developed By</h2>
						</div>
					</div>
				</div>

			<div class="row" style="justify-content: space-between">
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
				<div class="our-team">
					<div class="picture">
					<img class="img-fluid" src="img/developerlogo.jpg">
					</div>
					<div class="team-content">
					<h3 class="name">Yogesh Zala</h3>
					<h4 class="title">Web Developer</h4>
					</div>
					<ul class="social">
					<li><a href="" class="fa fa-facebook" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-twitter" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-google-plus" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-linkedin" aria-hidden="true"></a></li>
					</ul>
				</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
				<div class="our-team">
					<div class="picture">
					<img class="img-fluid" src="img/developerlogo.jpg">
					</div>
					<div class="team-content">
					<h3 class="name">Hiren Prajapati</h3>
					<h4 class="title">Web Developer</h4>
					</div>
					<ul class="social">
					<li><a href="" class="fa fa-facebook" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-twitter" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-google-plus" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-linkedin" aria-hidden="true"></a></li>
					</ul>
				</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
				<div class="our-team">
					<div class="picture">
					<img class="img-fluid" src="img/developerlogo.jpg">
					</div>
					<div class="team-content">
					<h3 class="name">Om Patel</h3>
					<h4 class="title">Web Developer</h4>
					</div>
					<ul class="social">
					<li><a href="" class="fa fa-facebook" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-twitter" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-google-plus" aria-hidden="true"></a></li>
					<li><a href="" class="fa fa-linkedin" aria-hidden="true"></a></li>
					</ul>
				</div>
				</div>
			</div>

			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6656.555449978528!2d71.66538140530594!3d22.724915267965642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959472b75ca7991%3A0x62598a8f122ad119!2sC%20U.Shah%20Polytechnic(Govrrnment%20Run)!5e0!3m2!1sen!2sin!4v1579073265888!5m2!1sen!2sin" width=100% height="485" frameborder="0" style="border:0;" allowfullscreen="true">
				</iframe>
			</div>
		</div>
	</section>
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

</body>
</html>