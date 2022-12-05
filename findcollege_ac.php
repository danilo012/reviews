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

									?>
									<div class="profile-icon">
									<img src="<?php echo($profileimg)?>">
									<div class="dropdown">
									<p><?php echo"$fname $lname ";?><i class='fa fa-caret-down'></i></p>
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
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>Find college</span>
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
						<form class="course-search-form" action="findcollege_ac.php" method="POST">
														
							<select name="course" style="width: 358px;">
	                            <option value="0">Course</option>
	                            <?php
									require_once("connection.php");
									$query="SELECT 
											    *
											FROM
											    course_details
											INNER JOIN college_info USING (collegeid)
											WHERE approved=1;";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
								        	$cou=$row["course"];
								        	?>
								        	<option value="<?php echo($cou)?>"><?php echo "$cou"?></option>
								        	<?php
								    	}
									}
								?>
	                            
                          	</select>

							<select name="city" style="width: 358px;">
	                          <option value="0">City</option>
	                          <?php
									require_once("connection.php");
									$query="SELECT DISTINCT city FROM `college_info` where approved=1;";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
								        	$city=$row["city"];
								        	?>
								        	<option value="<?php echo($city)?>"><?php echo "$city"?></option>
								        	<?php
								    	}
									}
								?>
	                        </select>

							<input class="site-btn btn-dark" type="submit" name="search" value="Search college">

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->

	<!-- course section -->
	<section class="course-section spad pb-0">
		<div class="course-warp">
			<ul class="course-filter controls">
				<li class="control active" data-filter="all">All</li>
				<li class="control" data-filter=".finance">Government</li>
				<li class="control" data-filter=".design">Private</li>
			</ul>                                       
			<div class="row course-items-area">

							<?php
								$course=$_POST['course'];
								$city=$_POST['city'];
								if($course!='0' && $city!='0')
								{
									require_once("connection.php");
									$query="SELECT 
											    *
											FROM
											    college_info
											INNER JOIN course_details USING (collegeid)
											WHERE course LIKE '%$course%' and city='$city';";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
											$id=$row['collegeid'];
								        	$clgname=$row['collegename'];
								        	$clgtype=$row['collegetype'];
								        	$profileimg=$row['img'];

								        	if ($clgtype=="Private") {
								        		?>

								        		<div class="mix col-lg-3 col-md-4 col-sm-6 design">
													<div class="course-item">
														<div class="course-thumb set-bg"><img class="back-img" src="<?php echo($profileimg)?>">
														</div>
														<div class="course-info">
															<a href="collegedetails.php?id=<?php echo $id; ?>">
																<div class="course-text" style="height: 158.6px;">
																<h5><?php echo"$clgname";?></h5>
																<?php
																	$couquery="select * from course_details where collegeid=$id";
																	$cousql=mysqli_query($con,$couquery);
																	$cou=mysqli_num_rows($cousql);
																?>
																<div class="students"><span><?php echo"$cou";?> Courses</span></div>
															</div>
															</a>
														</div>
													</div>
												</div>

								        		<?php
								        	}
								        	else if ($clgtype=="Government")
								        	{
								        		?>

								        		<div class="mix col-lg-3 col-md-4 col-sm-6 finance">
													<div class="course-item">
														<div class="course-thumb set-bg"><img class="back-img" src="<?php echo($profileimg)?>">
														</div>
														<div class="course-info">
															<a href="collegedetails.php?id=<?php echo $id; ?>">
																<div class="course-text" style="height: 158.6px;">
																<h5><?php echo"$clgname";?></h5>
																<?php
																	$couquery="select * from course_details where collegeid=$id";
																	$cousql=mysqli_query($con,$couquery);
																	$cou=mysqli_num_rows($cousql);
																?>
																<div class="students"><span><?php echo"$cou";?> Courses</span></div>
															</div>
															</a>
														</div>
													</div>
												</div>

								        		<?php
								        	}
								    	}
									}
									else
									{
										?>
										<h2 style="color: grey; margin-bottom: 40px; margin-left: 600px;">No records found...</h2>
										<?php
									}
									require_once("closeconnection.php");
								}
								else if ($course!='0') {
									require_once("connection.php");
									$query="SELECT 
											    *
											FROM
											    college_info
											INNER JOIN course_details USING (collegeid)
											WHERE course LIKE '%$course%';";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
											$id=$row['collegeid'];
								        	$clgname=$row['collegename'];
								        	$clgtype=$row['collegetype'];
								        	$profileimg=$row['img'];

								        	if ($clgtype=="Private") {
								        		?>

								        		<div class="mix col-lg-3 col-md-4 col-sm-6 design">
													<div class="course-item">
														<div class="course-thumb set-bg"><img class="back-img" src="<?php echo($profileimg)?>">
														</div>
														<div class="course-info">
															<a href="collegedetails.php?id=<?php echo $id; ?>">
																<div class="course-text" style="height: 158.6px;">
																<h5><?php echo"$clgname";?></h5>
																<?php
																	$couquery="select * from course_details where collegeid=$id";
																	$cousql=mysqli_query($con,$couquery);
																	$cou=mysqli_num_rows($cousql);
																?>
																<div class="students"><span><?php echo"$cou";?> Courses</span></div>
															</div>
															</a>
														</div>
													</div>
												</div>

								        		<?php
								        	}
								        	else if ($clgtype=="Government")
								        	{
								        		?>

								        		<div class="mix col-lg-3 col-md-4 col-sm-6 finance">
													<div class="course-item">
														<div class="course-thumb set-bg"><img class="back-img" src="<?php echo($profileimg)?>">
														</div>
														<div class="course-info">
															<a href="collegedetails.php?id=<?php echo $id; ?>">
																<div class="course-text" style="height: 158.6px;">
																<h5><?php echo"$clgname";?></h5>
																<?php
																	$couquery="select * from course_details where collegeid=$id";
																	$cousql=mysqli_query($con,$couquery);
																	$cou=mysqli_num_rows($cousql);
																?>
																<div class="students"><span><?php echo"$cou";?> Courses</span></div>
															</div>
															</a>
														</div>
													</div>
												</div>

								        		<?php
								        	}
								    	}
									}
									else
									{
										?>
										<h2 style="color: grey; margin-bottom: 40px; margin-left: 600px;">No records found...</h2>
										<?php
									}
									require_once("closeconnection.php");

								}
								else if ($city!='0') {
									
									require_once("connection.php");
									$query="SELECT * FROM `college_info` where approved=1 and city='$city';";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
											$id=$row['collegeid'];
								        	$clgname=$row['collegename'];
								        	$clgtype=$row['collegetype'];
								        	$profileimg=$row['img'];

								        	if ($clgtype=="Private") {
								        		?>

								        		<div class="mix col-lg-3 col-md-4 col-sm-6 design">
													<div class="course-item">
														<div class="course-thumb set-bg"><img class="back-img" src="<?php echo($profileimg)?>">
														</div>
														<div class="course-info">
															<a href="collegedetails.php?id=<?php echo $id; ?>">
																<div class="course-text" style="height: 158.6px;">
																<h5><?php echo"$clgname";?></h5>
																<?php
																	$couquery="select * from course_details where collegeid=$id";
																	$cousql=mysqli_query($con,$couquery);
																	$cou=mysqli_num_rows($cousql);
																?>
																<div class="students"><span><?php echo"$cou";?> Courses</span></div>
															</div>
															</a>
														</div>
													</div>
												</div>

								        		<?php
								        	}
								        	else if ($clgtype=="Government")
								        	{
								        		?>

								        		<div class="mix col-lg-3 col-md-4 col-sm-6 finance">
													<div class="course-item">
														<div class="course-thumb set-bg"><img class="back-img" src="<?php echo($profileimg)?>">
														</div>
														<div class="course-info">
															<a href="collegedetails.php?id=<?php echo $id; ?>">
																<div class="course-text" style="height: 158.6px;">
																<h5><?php echo"$clgname";?></h5>
																<?php
																	$couquery="select * from course_details where collegeid=$id";
																	$cousql=mysqli_query($con,$couquery);
																	$cou=mysqli_num_rows($cousql);
																?>
																<div class="students"><span><?php echo"$cou";?> Courses</span></div>
															</div>
															</a>
														</div>
													</div>
												</div>

								        		<?php
								        	}
								    	}
									}
									else
									{
										?>
										<h2 style="color: grey; margin-bottom: 40px; margin-left: 600px;">No records found...</h2>
										<?php
									}
									require_once("closeconnection.php");
								}
								else
								{
									?>
									<h2 style="color: grey; margin-bottom: 40px; margin-left: 600px;">No records found...</h2>
									<?php
								}
							?>
			</div>
		</div>
	</section>
	<div style="margin-bottom: 50px;"></div>
	<!-- course section end -->

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