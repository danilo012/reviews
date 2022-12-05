<!-- Header Section -->
<?php include_once "header.php" ?>

<!-- Hero Section -->
<section class="hero-section set-bg" data-setbg="img/background.jpg">
	<div class="container">
		<div class="hero-text text-white">
			<h2>Student Review</h2>
			<p>This is simple feedback website, It helps visitors to choose the best college for their courses.<br>And also provide facility to students for writing review of colleges.
		</div>
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<form class="intro-newslatter" action="search_ac.php" method="POST">

					<?php
					if (isset($_REQUEST['no-record'])) {
					?>
						<input type="text" list="brow" placeholder="No record found..." name="college" required="required">
					<?php
					} else {
					?>
						<input type="text" list="brow" placeholder="Search college" name="college" required="required">
					<?php
					}
					?>

					<input type="submit" name="search" class="site-btn" value="Search College">
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Categories Section -->
<section class="categories-section spad">
	<div class="container">
		<div class="section-title">
			<h2>Top colleges</h2>
			<p>Here you can get best rated colleges by students.</p>
		</div>
		<div class="row">

			<?php
			require_once("connection.php");
			$query = "SELECT * FROM `college_info` where approved=1;";
			$sql = mysqli_query($con, $query);
			if (mysqli_num_rows($sql) > 0) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$id = $row['collegeid'];
					$clgname = $row['collegename'];
					$clgtype = $row['collegetype'];
					$city = $row['city'];
					$addr = $row['address'];
					$profileimg = $row['img'];

			?>

					<div class="col-lg-4 col-md-6">
						<div class="categorie-item">
							<div class="ci-thumb set-bg"><img class="back-img" src="<?php echo ($profileimg) ?>"></div>
							<a href="collegedetails.php?id=<?php echo $id; ?>">
								<div class="ci-text" style="height: 158.6px;">
									<h5><?php echo "$clgname"; ?></h5>

									<?php
									$couquery = "select * from course_details where collegeid=$id";
									$cousql = mysqli_query($con, $couquery);
									$cou = mysqli_num_rows($cousql);
									?>

									<span><?php echo "$cou"; ?> Courses</span>
								</div>
							</a>
						</div>
					</div>

			<?php
				}
			}
			require_once("closeconnection.php");
			?>

</section>

<!-- Footer Section -->
<?php include_once "footer.php" ?>