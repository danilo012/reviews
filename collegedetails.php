<!-- Header Section -->
<?php include_once "header.php" ?>

	<?php
		if(isset($_REQUEST['rev-suc']))
		{
		    ?>
								<div id="id011" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6 style="color: green;">Your review submitted successfully!</h6>
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
		if(isset($_REQUEST['write-rev']))
		{
		    ?>
								<div id="id010" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6>You need to have student account to write review!</h6>
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
		if(isset($_REQUEST['stu-write-rev']))
		{
		    ?>
								<div id="id010" class="modal " style="display: block;">  
									<div class="login-msg">
										<div class="modal-content animate">
											<div class="imgcontainer">
											  <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
											</div> 
											<h6>You are not able to write a review of this college!</h6>
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
								        	$fname=$row['fname'];
								        	$lname=$row['lname'];
								        	$profileimg=$row['img'];
								    	}
									}

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
	<div class="page-info-section-register set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>College details</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

<!-- Page -->
								<?php
									require_once("connection.php");
									$id=$_REQUEST['id'];
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

	<div class="profile-warp">
	
	<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                    	<form action="clgprofile_upload_ac.php" method="POST" enctype="multipart/form-data">
                    		
                    		<div class="profile-img">
                            <img src="<?php echo($profileimg) ?>">
                            <div class="file btn btn-lg btn-primary" style="display: none;">
                                Choose image
                                <input type="file" name="filetoupload" required="required" />
                            </div>
                        	</div> 	

                    	</form>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <?php
                                    	echo "<h5>$clgname</h5>";
                                    ?>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                
								            	<li class="nav-item">
				                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">College details</a>
				                                </li>
				                                <li class="nav-item">
				                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Course details</a>
				                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">

								
								    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							
												                                      
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>College name</label>
                                            </div>
                                            <div class="col-md-6">
												<?php
                                                	echo "<p>$clgname</p>";
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>College type</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	echo "<p>$clgtype</p>";
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
                                                <label>City</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	echo "<p>$city</p>";
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

                           
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								            	

		                        <div class="addclg-pass-form">

		                            <div class="table-responsive">
			                            <table>
			                                <thead>
			                                    <tr>
			                                    	<th>No.</th>
			                                        <th>Course name</th>
			                                        <th>Year</th>
			                                        <th>Fees</th>
			                                    </tr>
			                                </thead>

			                                	<?php
                                
					                                    $no=0;
					                                    $couquery="SELECT * FROM `course_details` where collegeid=$id;";
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
					                                                </tr>
					                                            </tbody>

					                                            <?php
					                                        }
					                                    }
					                                    // require_once("closeconnection.php");
					                            ?>            
			                            </table>
			                        </div>
		                        </div>
                            </div>
                        </div>
                    </div>
                </div>
               	<?php
               		if (isset($_SESSION['studentid'])) {
               			$sid=$_SESSION['studentid'];
               			$id=$_REQUEST['id'];
	               		$query="select * from college_review where studentid=$sid and collegeid=$id;";
	               		$sql=mysqli_query($con,$query);
	               		if(mysqli_num_rows($sql) > 0) 
	               		{
	               			?>
	               				<a class="rev-btn" href="editreview.php?id=<?php $id=$_REQUEST['id']; echo $id; ?>" >Edit review</a>
	               			<?php
	               		}
	               		else
	               		{
	               			?>
	               				<a class="rev-btn" href="writereview.php?id=<?php $id=$_REQUEST['id']; echo $id; ?>" >Write review</a>
	               			<?php
	               		}
	               	}
	               	else
	               	{
	               		?>
	               			<a class="rev-btn" href="writereview.php?id=<?php $id=$_REQUEST['id']; echo $id; ?>" >Write review</a>
	               		<?php
	               	}
               	?>

                <h6 class="rev-font">Reviews</h6>
                <hr style="border:3px solid #f1f1f1; margin-top: 20px;">

                <h3>Student Rating</h3>
				
				

                <div style="display: inline-block;">

                				<?php
									$id=$_REQUEST['id'];
									$ratesum=0;
									require_once("connection.php");
									$query="SELECT 
											    *
											FROM
											    college_review
											where 
											    collegeid=$id ";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
								        	$rate=$row['rate'];
								        	$ratesum=$ratesum+$rate;
								        }
								    
								    $stucount=mysqli_num_rows($sql);
								    $orate=$ratesum/$stucount;
								    $rorate=round($orate);
								    $forate=number_format($orate,1);
								    }
								    else
								    {
								    	$orate=0;
								    	$rorate=0;
								    	$forate=0;
								    }

								    if($rorate==5)
								    {
								    	?>
								      <div style="margin-left: -13px;">
				                	      <input class="star star-4"  type="radio" name="star" value="5" checked="checked" />
									      <label class="star star-4" for="star-5-2"></label>
									      <input class="star star-4"  type="radio" name="star" value="4"/>
									      <label class="star star-4" for="star-4-2"></label>
									      <input class="star star-3"  type="radio" name="star" value="3"/>
									      <label class="star star-3" for="star-3-2"></label>
									      <input class="star star-2"  type="radio" name="star" value="2"/>
									      <label class="star star-2" for="star-2-2"></label>
									      <input class="star star-1"  type="radio" name="star" value="1"/>
									      <label class="star star-1" for="star-1-2"></label>
			                	      </div>
			                	      	<?php
								    }
								    else if($rorate==4)
								    {
								    	?>
								      <div style="margin-left: -13px;">
				                	      <input class="star star-4"  type="radio" name="star" value="5"/>
									      <label class="star star-4" for="star-5-2"></label>
									      <input class="star star-4"  type="radio" name="star" value="4" checked="checked"/>
									      <label class="star star-4" for="star-4-2"></label>
									      <input class="star star-3"  type="radio" name="star" value="3"/>
									      <label class="star star-3" for="star-3-2"></label>
									      <input class="star star-2"  type="radio" name="star" value="2"/>
									      <label class="star star-2" for="star-2-2"></label>
									      <input class="star star-1"  type="radio" name="star" value="1"/>
									      <label class="star star-1" for="star-1-2"></label>
			                	      </div>
			                	      	<?php
								    }
								    else if($rorate==3)
								    {
								    	?>
								      <div style="margin-left: -13px;">
				                	      <input class="star star-4"  type="radio" name="star" value="5"/>
									      <label class="star star-4" for="star-5-2"></label>
									      <input class="star star-4"  type="radio" name="star" value="4"/>
									      <label class="star star-4" for="star-4-2"></label>
									      <input class="star star-3"  type="radio" name="star" value="3" checked="checked"/>
									      <label class="star star-3" for="star-3-2"></label>
									      <input class="star star-2"  type="radio" name="star" value="2"/>
									      <label class="star star-2" for="star-2-2"></label>
									      <input class="star star-1"  type="radio" name="star" value="1"/>
									      <label class="star star-1" for="star-1-2"></label>
			                	      </div>
			                	      	<?php
								    }
								    else if($rorate==2)
								    {
								    	?>
								      <div style="margin-left: -13px;">
				                	      <input class="star star-4"  type="radio" name="star" value="5"/>
									      <label class="star star-4" for="star-5-2"></label>
									      <input class="star star-4"  type="radio" name="star" value="4"/>
									      <label class="star star-4" for="star-4-2"></label>
									      <input class="star star-3"  type="radio" name="star" value="3"/>
									      <label class="star star-3" for="star-3-2"></label>
									      <input class="star star-2"  type="radio" name="star" value="2" checked="checked"/>
									      <label class="star star-2" for="star-2-2"></label>
									      <input class="star star-1"  type="radio" name="star" value="1"/>
									      <label class="star star-1" for="star-1-2"></label>
			                	      </div>
			                	      	<?php
								    }
								    else if($rorate==1)
								    {
								    	?>
								      <div style="margin-left: -13px;">
				                	      <input class="star star-4"  type="radio" name="star" value="5"/>
									      <label class="star star-4" for="star-5-2"></label>
									      <input class="star star-4"  type="radio" name="star" value="4"/>
									      <label class="star star-4" for="star-4-2"></label>
									      <input class="star star-3"  type="radio" name="star" value="3"/>
									      <label class="star star-3" for="star-3-2"></label>
									      <input class="star star-2"  type="radio" name="star" value="2"/>
									      <label class="star star-2" for="star-2-2"></label>
									      <input class="star star-1"  type="radio" name="star" value="1" checked="checked"/>
									      <label class="star star-1" for="star-1-2"></label>
			                	      </div>
			                	      	<?php
								    }
								    else
								    {
								    	?>
								      <div style="margin-left: -13px;">
				                	      <input class="star star-4"  type="radio" name="star" value="5"/>
									      <label class="star star-4" for="star-5-2"></label>
									      <input class="star star-4"  type="radio" name="star" value="4"/>
									      <label class="star star-4" for="star-4-2"></label>
									      <input class="star star-3"  type="radio" name="star" value="3"/>
									      <label class="star star-3" for="star-3-2"></label>
									      <input class="star star-2"  type="radio" name="star" value="2"/>
									      <label class="star star-2" for="star-2-2"></label>
									      <input class="star star-1"  type="radio" name="star" value="1"/>
									      <label class="star star-1" for="star-1-2"></label>
			                	      </div>
			                	      	<?php
								    }
								?>   

                </div>
				<p style="margin-left: 280px; margin-top: -93px; color: black; font-size: 35px; font-weight: 550;"><?php echo"$forate"?></p>
				<p style="margin-top: -20px;">Overall rating out of 5 star.</p>
                
                <hr style="border:3px solid #f1f1f1">

                			<?php
									$id=$_REQUEST['id'];
									require_once("connection.php");
									$query="SELECT 
											    *
											FROM
											    college_review
											INNER JOIN
											    student_details USING (studentid)
											INNER JOIN
											    course_details USING (courseid)
											where 
											    college_review.collegeid=$id ";
									$sql=mysqli_query($con,$query);
									if(mysqli_num_rows($sql) > 0)          
									{
										while($row = mysqli_fetch_assoc($sql))
										{
											$fname=$row['fname'];
											$lname=$row['lname'];
											$course=$row['course'];
											$img=$row['img'];
											$review=$row['review'];
								        	$rate=$row['rate'];
								        	$date=$row['date'];

								        	?>

								        	<div class="blog-post">
						
												<div class="blog-metas">
													<div class="blog-meta author">
														<div class="post-author set-bg" data-setbg="<?php echo($img)?>"></div>
														<a href="#"><?php echo"$fname $lname"?></a>
													</div>
													<div class="blog-meta">
														<a href="#"><?php echo"$course"?></a>
													</div>
													<div class="blog-meta">
														<a href="#"><?php $fdate=date("d-m-Y",strtotime($date)); echo"$fdate"?></a>
													</div>
													
												</div>
												<p><?php echo"$review"?></p>

												<?php

													if ($rate==5) {
														?>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<?php
													}
													else if ($rate==4) {
														?>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<?php
													}
													else if ($rate==3) {
														?>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<?php
													}
													else if ($rate==2) {
														?>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<?php
													}
													else {
														?>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<?php
													}
												?>

													
											</div>

											<hr style="margin-top: -30px;">

								        	<?php

								    	}
									}
									
									require_once("closeconnection.php");
								
							?>
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