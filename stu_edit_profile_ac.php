<?php
	session_start();
	require_once("connection.php");
	$email=$_POST['email'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mo=$_POST['mo'];
	$enno=$_POST['enno'];	
	$addr=$_POST['addr'];
	$id=$_SESSION['studentid'];

		$query="UPDATE `student_details` SET `email` = '$email', `enno` = '$enno', `fname` = '$fname', `lname` = '$lname', `mobno` = '$mo', `address` = '$addr' WHERE `student_details`.`studentid` = $id;";

		if (mysqli_query($con,$query))
		{
	    	header("location:student_accountinfo.php?edit-suc=sucess");
		}
		else
		{
			header("location:stu_edit_profile.php?edit-fail=failed");
		}
	
	require_once("closeconnection.php");
?>