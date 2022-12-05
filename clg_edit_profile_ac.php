<?php
	session_start();
	require_once("connection.php");
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$clgname=$_POST['clgname'];
	$clgtype=$_POST['type'];	
	$mo=$_POST['mo'];
	$city=$_POST['city'];	
	$addr=$_POST['addr'];
	$id=$_SESSION['collegeid'];

		$query="UPDATE `college_info` SET `email` = '$email', `collegename` = '$clgname', `collegetype` = '$clgtype', `mobno` = '$mo', `city` = '$city', `address` = '$addr' WHERE `college_info`.`collegeid` = $id;";

		if (mysqli_query($con,$query))
		{
	    	header("location:college_accountinfo.php?edit-suc=sucess");
		}
		else
		{
			header("location:clg_edit_profile.php?edit-fail=failed");
		}
	
	require_once("closeconnection.php");
?>