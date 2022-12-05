<?php
	session_start();
	require_once("connection.php");
	$clgid=$_SESSION['collegeid'];
	$course=$_POST['course'];
	$year=$_POST['year'];
	$fees=$_POST['fees'];

	$query="INSERT INTO `student_review`.`course_details` (
					`collegeid` ,
					`course` ,
					`year` ,
					`fees` 
					)
					VALUES ('$clgid', '$course', '$year', '$fees'
					);";

		if (mysqli_query($con,$query))
		{
	    	header("location:addcourse.php");
		}
	
	require_once("closeconnection.php");
?>