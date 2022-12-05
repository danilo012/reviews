<?php
	$con=mysqli_connect("localhost","root","","student_review");
	if (!$con)
	{
    	die("Connection failed: " . mysqli_connect_error());
	}
?>