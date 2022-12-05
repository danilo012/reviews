<?php
	require_once("connection.php");
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$clgname=$_POST['clgname'];
	$clgtype=$_POST['type'];	
	$mo=$_POST['mo'];
	$city=$_POST['city'];	
	$addr=$_POST['addr'];
	$filepath="img/profile.png";

			$query="INSERT INTO `student_review`.`college_info` (
					`email` ,
					`pass` ,
					`collegename` ,
					`collegetype` ,
					`img` ,
					`mobno` ,
					`city` ,
					`address`
					)
					VALUES ('$email', '$psw', '$clgname', '$clgtype', '$filepath', '$mo', '$city', '$addr'
					);";

		if (mysqli_query($con,$query))
		{
	    	header("location:index.php?reg-suc=sucess");
		}
		else
		{
			header("location:register.php?clgmsg=failed");
		}
	
	require_once("closeconnection.php");
?>