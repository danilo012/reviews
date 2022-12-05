<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student review</title>
	   
	<link href="img/icon.png" rel="shortcut icon"/>

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
		if(isset($_REQUEST['edit-suc']))
		{
		    ?>
								<div id="id011" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6 style="color: green;">Course edited successfully!</h6>
											<div class="okbtn">
												<button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id011').style.display='none'" style="width:auto;">Ok</button>
											</div>
										</div>
									</div>
								</div>		
			<?php
		}
	?>

	<?php
		if(isset($_REQUEST['delete-suc']))
		{
		    ?>
								<div id="id011" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6 style="color: green;">Course deleted successfully!</h6>
											<div class="okbtn">
												<button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id011').style.display='none'" style="width:auto;">Ok</button>
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
								if(isset($_SESSION['collegeid']))
								{
									require_once("connection.php");
									$id=$_SESSION['collegeid'];
									$query="SELECT * FROM `college_info` WHERE collegeid='$id'";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
											$email=$row['email'];
								        	$clgname=$row['collegename'];
								        	$clgtype=$row['collegetype'];
								        	$mo=$row['mobno'];
								        	$city=$row['city'];
								        	$addr=$row['address'];
								        	$profileimg=$row['img'];
								    	}
									}
									?>
									<div class="profile-icon">
									<img src=" <?php echo($profileimg) ?> ">
									<div class="dropdown">
									<p style="margin-left: -20px;"><i class='fa fa-caret-down'></i></p>
									<p class="uname-overflow-hidden"><?php echo"$clgname";?></p>
									<?php
								}
							?>
							  <div class="dropdown-content">
							  <a href="college_accountinfo.php">Account info</a>
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

							<li style="margin-left: -45px;"><a href="aboutus.php">About us</a></li>
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
				<span>Add courses</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

<!-- Page -->

		<div class="register-form-hide" style="display: block;">
			<div class="register-form-warp">
				
				<div class="section-title text-white text-left">
					<h2>Add courses</h2>
				</div>

				<form class="register-form animate" action="addcourse_ac.php" method="POST">

					<input type="text" placeholder="Course name" name="course" required="required">
		            <input type="text" placeholder="No. of year" name="year" required="required">
		            <input type="text" placeholder="Fees" name="fees" required="required">	
							
					<input type="submit" name="submit" value="Add" class="site-btn">

					<div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                	<th>No.</th>
                                    <th>Course name</th>
                                    <th>Year</th>
                                    <th>Fees</th>
                                    <th>Edit course</th>
                                    <th>Delete course</th>
                                </tr>
                            </thead>

                            	<?php
                
	                                    $no=0;
	                                    $clgid=$_SESSION['collegeid'];
	                                    $couquery="SELECT * FROM `course_details` where collegeid=$clgid;";
	                                    $cousql=mysqli_query($con,$couquery);
	                                    if(mysqli_num_rows($cousql) > 0)          
	                                    {
	                                        while($row = mysqli_fetch_assoc($cousql))
	                                        {
	                                            $no=$no+1;
	                                            $id=$row['courseid'];
	                                            $course=$row['course'];
	                                            $year=$row['year'];
	                                            $fees=$row['fees'];
	                                            
	                                            ?>

	                                            <tbody>
	                                                <tr>
	                                                    <td><?php echo"$no";?></td>
	                                                    <td><?php echo"$course";?></td>
	                                                    <td><?php echo"$year";?></td>
	                                                    <td><?php echo"$fees";?></td>
	                                                    <td><a href="editcourse.php?id=<?php echo $id; ?>">Edit</a></td>
	                                                    <td><a href="deletecourse.php?id=<?php echo $id; ?>">Delete</a></td>
	                                                </tr>
	                                            </tbody>

	                                            <?php
	                                        }
	                                    }
	                                    require_once("closeconnection.php");

	                            ?>            
                        </table>
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