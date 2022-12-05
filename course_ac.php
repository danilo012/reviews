<?php
	require_once("connection.php");

	$college=$_POST['college'];
	$query="select * from course_details where collegeid = $college";
	$sql=mysqli_query($con,$query);
	
		if(mysqli_num_rows($sql) > 0)
		{
			
			?>
			<select name="course" required="required">
			<option value="">Course</option>
			<?php
			while ($row = mysqli_fetch_assoc($sql)) {
				$cou=$row['course'];
				$couid=$row['courseid'];
				?>
				<option value="<?php echo($couid)?>"><?php echo"$cou";?></option>
				<?php
			}
			echo "</select>";
		}

	require_once("closeconnection.php");
?>