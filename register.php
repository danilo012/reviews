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
					<a href="register.php" class="site-btn header-btn">Register</a>
					<button class="site-btn header-btn" style="margin-right: 10px;" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>		
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
						<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" name="email" placeholder="Email" required="required">
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
						<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" name="email" placeholder="Email" required="required">
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
	<div class="page-info-section-register set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>Register</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

<!-- Page -->

	<!-- Register page -->

		<!-- Student Register page -->

		<?php
			if(isset($_REQUEST['clgmsg']) || isset($_REQUEST['clgsel']))
			{
			    ?>

					<div id="id03" style="display: none;">
					
			<?php
			}
			else
			{
				?>
					<div id="id03">
				<?php
			}
		?>

			<div class="register-form-warp">
				<div class="section-title text-white text-left">
					<h2>Student register</h2>
					<button class="register-btn btn-primary btn-lg btn-block register-navbtn" onclick="document.getElementById('id04').style.display='block', document.getElementById('id03').style.display='none'" style="width:auto;">College register</button>
				</div>
				<form class="register-form animate" action="stu_register_ac.php" method="POST">

							<?php
					            if(isset($_REQUEST['stumsg']))
					            {
					              ?>
					              <div style="text-align: center; color: red; margin-bottom: 20px;">
					                Invalid registration!
					              </div>
					              <?php
					            }
					      	?>

							<input type="text" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" required="required">

                            <input type="password" placeholder="Password" name="psw" required="required">
                            
                            <input type="text" placeholder="First name" name="fname" required="required">
                            
                            <input type="text" placeholder="Last name" name="lname" required="required">

                            <div class="register-form-radio">
                            	<input type="radio" name="gender" value="male" checked required="required">
                                <h5>Male</h5>
                            	<input type="radio" name="gender" value="female" required="required">
                                <h5>Female</h5>
                            </div>

                            <select name="sem" required="required">
                            <option value="">Semester</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                            </select>

                            <input type="text" name="mo" placeholder="Mobile no." required="required" pattern="[0-9]{10}">

                            <input type="text" name="enno" placeholder="Enrollment no." required="required">                
							
							<select name="college" id="college" required="required">
	                            <option value="">College</option>
	                            <?php
									require_once("connection.php");
									$query="SELECT * FROM `college_info` where approved=1;";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
								        	$clgid=$row["collegeid"];
								        	$clgname=$row["collegename"];
								        	?>
								        	<option value="<?php echo($clgid)?>"><?php echo "$clgname"?></option>
								        	<?php
								    	}
									}
									require_once("closeconnection.php");
								?>
	                            
                          	</select>

                          	<div id="course">
                          		<select name="course" id="course" required="required">
	                            	<option value="">Course</option>
    	                      	</select>
                          	</div>
                            
                            <textarea placeholder="Address" rows="3" name="addr" required="required"></textarea>
							
							<input type="submit" name="submit" value="Submit" class="site-btn">
				</form>
			</div>
			
		</div>

		<!-- Student Register page end -->

		<!-- College Register page -->

		<?php
			if(isset($_REQUEST['clgmsg']) || isset($_REQUEST['clgsel']))
			{
			    ?>

					<div id="id04" class="register-form-hide" style="display: block;">

			<?php
			}
			else
			{
				?>
					<div id="id04" class="register-form-hide" >
				<?php
			}
		?>

			<div class="register-form-warp">
				<div class="section-title text-white text-left">
					<h2>College register</h2>
					<button class="register-btn btn-primary btn-lg btn-block register-navbtn" onclick="document.getElementById('id03').style.display='block', document.getElementById('id04').style.display='none' " style="width:auto;">Student register</button>
				</div>

				<form class="register-form animate" action="clg_register_ac.php" method="POST">

							<?php
					            if(isset($_REQUEST['clgmsg']))
					            {
					              ?>
					              <div style="text-align: center; color: red; margin-bottom: 20px;">
					                Invalid registration!
					              </div>
					              <?php
					            }
					      	?>

							<input type="text" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" required="required">

                            <input type="password" placeholder="Password" name="psw" required="required">
                            
                            <input type="text" placeholder="College name" name="clgname" required="required">

                            <select name="type" required="required">
	                          <option value="">College type</option>
	                          <option value="Government">Government</option>
	                          <option value="Private">Private</option>
                      		</select>

                            <input type="text" placeholder="Mobile no." name="mo" pattern="[0-9]{10}" required="required">

                            <select name="city" required="required">
                              <option value="">City</option>
	                          <option value="Ahmedabad">Ahmedabad</option>
	                          <option value="Amreli">Amreli</option>
	                          <option value="Anand">Anand</option>
	                          <option value="Banas Kantha">Banas Kantha</option>
	                          <option value="Bharuch">Bharuch</option>
	                          <option value="Bhavnagar">Bhavnagar</option>
	                          <option value="Dahod">Dahod</option>
	                          <option value="Gandhinagar">Gandhinagar</option>
	                          <option value="Jamnagar">Jamnagar</option>
	                          <option value="Junagadh">Junagadh</option> 
	                          <option value="Kachchh">Kachchh</option>
	                          <option value="Kheda">Kheda</option>
	                          <option value="Mahesana">Mahesana</option>
	                          <option value="Narmada">Narmada</option>
	                          <option value="Navsari">Navsari</option>
	                          <option value="Panch Mahals">Panch Mahals</option>
	                          <option value="Patan">Patan</option>
	                          <option value="Porbandar">Porbandar</option>
	                          <option value="Rajkot">Rajkot</option>
	                          <option value="Sabar Kantha">Sabar Kantha</option>
	                          <option value="Surat">Surat</option>
	                          <option value="Surendranagar">Surendranagar</option>
	                          <option value="Tapi">Tapi</option>
	                          <option value="The Dangs">The Dangs</option>
	                          <option value="Vadodara">Vadodara</option>
	                          <option value="Valsad">Valsad</option>
   							</select>
                            
                            <textarea placeholder="Address" rows="3" name="addr" required="required"></textarea>
							
							<input type="submit" name="submit" value="Submit" class="site-btn">
				</form>
			</div>
		</div>

		<!-- College Register page end -->

	<!-- Register page -->

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
		    $('#college').on('change', function(){
		        var college = $(this).val();
		        if(college){
		            $.ajax({
		                type:'POST',
		                url:'course_ac.php',
		                data:'college='+college,
		                success:function(html){
		                    $('#course').html(html);
		                }
		            }); 
		        }
		    });
	    });

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