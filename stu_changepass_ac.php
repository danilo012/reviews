<?php
	session_start();
	require_once("connection.php");
	$cupass=$_POST['cupass'];
	$newpass=$_POST['newpass'];
	$id=$_SESSION['studentid'];
	$query="SELECT * FROM `student_details` WHERE pass = '$cupass' and studentid = '$id'";
	$sql=mysqli_query($con,$query);
	if(mysqli_num_rows($sql) > 0)          
	{
		$query2="UPDATE `student_details` SET `pass` = '$newpass' WHERE `student_details`.`studentid` = $id;";
		
		if(mysqli_query($con,$query2))
		{
			header("location:student_accountinfo.php?pass-suc=success");
		}          
	}
	else
	{
		header("location:student_accountinfo.php?pass-fail=failed");
	}
	require_once("closeconnection.php");
?>