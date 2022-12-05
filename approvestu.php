<?php
	require_once("connection.php");
	$id=$_REQUEST['id'];
	$query = "UPDATE `student_details` SET `approved` = '1' WHERE `student_details`.`studentid` = $id;";

	if (mysqli_query($con,$query)) 
	{
		header("location:managestudent.php?suc-approve");
	}
	require_once("closeconnection.php");
?>