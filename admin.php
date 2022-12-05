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

<div id="id01" class="modal" style="display: block; background-color: white;">  
	<div class="login-form">
			<form class="modal-content animate"  style="border:none;" action="admin_login_ac.php" method="POST">

				<h2 style="margin-top: 5px;">Admin Login</h2> 

					<div class="form-group has-error">
						<input type="email" class="form-control" name="email" placeholder="Email" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="psw" placeholder="Password" required="required">
					</div>

					<?php
			            if(isset($_REQUEST['admin-msg']))
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
				</div>
			</form>
		</div>
	</div>

</body>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</html>