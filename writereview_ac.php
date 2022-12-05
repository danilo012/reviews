<?php
	session_start();
	require_once("connection.php");
	$clgid=$_POST['clgid'];
	$stuid=$_SESSION['studentid'];
	$review=$_POST['reviews'];
	$rate=$_POST['star'];

	$query="INSERT INTO `college_review` (`studentid`, `collegeid`, `review`, `rate`, `date`) VALUES ('$stuid', '$clgid', '$review', '$rate', CURRENT_DATE());";

	if (mysqli_query($con,$query))
	{
	   	header("location:collegedetails.php?id=$clgid&rev-suc");
	}

	require_once("closeconnection.php");
?>