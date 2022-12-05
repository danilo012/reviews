<?php
	require_once("connection.php");
	$id=$_REQUEST['id'];
	$query = "DELETE FROM `course_details` WHERE `course_details`.`courseid` = $id";

	if (mysqli_query($con,$query)) 
	{
		header("location:addcourse.php?delete-suc");
	}
	require_once("closeconnection.php");
?>