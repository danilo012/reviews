<?php
	session_start();
	require_once("connection.php");
	$cupass=$_POST['cupass'];
	$newpass=$_POST['newpass'];
	$id=$_SESSION['collegeid'];
	$query="SELECT * FROM `college_info` WHERE pass = '$cupass' and collegeid = '$id'";
	$sql=mysqli_query($con,$query);
	if(mysqli_num_rows($sql) > 0)          
	{
		$query2="UPDATE `college_info` SET `pass` = '$newpass' WHERE `college_info`.`collegeid` = $id;";
		
		if(mysqli_query($con,$query2))
		{
			header("location:college_accountinfo.php?pass-suc=success");
		}          
	}
	else
	{
		header("location:college_accountinfo.php?pass-fail=failed");
	}
	require_once("closeconnection.php");
?>