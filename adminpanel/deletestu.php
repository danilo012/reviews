<?php
	require_once("../connection.php");
	$id=$_REQUEST['id'];
	$query = "DELETE FROM `student_details` WHERE `student_details`.`studentid` = $id";

	if (mysqli_query($con,$query)) 
	{
		header("location:managestu.php?suc");
	}
	require_once("../closeconnection.php");
?>