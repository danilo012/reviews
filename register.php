<!-- Header Section -->
<?php include_once "header.php" ?>

<!-- Page Info -->
<div class="page-info-section-register set-bg" data-setbg="img/background-banner.jpg">
	<div class="container">
		<div class="site-breadcrumb">
			<a href="index.php">Home</a>
			<span>Register</span>
		</div>
	</div>
</div>

<!-- Student Register -->

<?php
if (isset($_REQUEST['clgmsg']) || isset($_REQUEST['clgsel'])) {
?>
	<div id="id03" style="display: none;">
	<?php
} else {
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
				if (isset($_REQUEST['stumsg'])) {
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
					$query = "SELECT * FROM `college_info` where approved=1;";
					$sql = mysqli_query($con, $query);
					if (mysqli_num_rows($sql) > 0) {
						while ($row = mysqli_fetch_assoc($sql)) {
							$clgid = $row["collegeid"];
							$clgname = $row["collegename"];
					?>
							<option value="<?php echo ($clgid) ?>"><?php echo "$clgname" ?></option>
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

<!-- College Register -->

<?php
if (isset($_REQUEST['clgmsg']) || isset($_REQUEST['clgsel'])) {
?>
	<div id="id04" class="register-form-hide" style="display: block;">
	<?php
} else {
	?>
		<div id="id04" class="register-form-hide">
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
				if (isset($_REQUEST['clgmsg'])) {
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

		<!-- Footer Section -->
		<?php include_once "footer.php" ?>