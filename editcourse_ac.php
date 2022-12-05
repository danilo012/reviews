<?php
	require_once("connection.php");
	$course=$_POST['course'];
	$year=$_POST['year'];
	$fees=$_POST['fees'];
	$id=$_POST['couid'];

		$query="UPDATE `course_details` SET `course` = '$course', `year` = '$year', `fees` = '$fees' WHERE `courseid` = $id;";

		if (mysqli_query($con,$query))
		{
	    	header("location:addcourse.php?edit-suc=sucess");
		}
	
	require_once("closeconnection.php");
?>