<?php
	require_once("connection.php");
	session_start();
	$stuid=$_SESSION['studentid'];
	$review=$_POST['reviews'];
	$rate=$_POST['star'];
	$clgid=$_POST['clgid'];
	$query="UPDATE `college_review` SET `review` = '$review', `rate` = '$rate', `date` = CURRENT_DATE() WHERE studentid=$stuid and collegeid=$clgid;";
	if (mysqli_query($con,$query))
	{
	   	header("location:collegedetails.php?id=$clgid&rev-suc");
	}
	require_once("closeconnection.php");
?>