<?php
	require_once("connection.php");
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$sem=$_POST['sem'];
	$clg=$_POST['college'];
	$course=$_POST['course'];
	$clg=$_POST['college'];	
	$mo=$_POST['mo'];
	$enno=$_POST['enno'];	
	$addr=$_POST['addr'];
	$filepath="img/profile.png";

			$query="INSERT INTO `student_review`.`student_details` (
					`collegeid` ,
					`courseid` ,
					`email` ,
					`pass` ,
					`enno` ,
					`sem` ,
					`fname` ,
					`lname` ,
					`mobno` ,
					`gender` ,
					`img` ,
					`address`
					)
					VALUES ('$clg', '$course', '$email', '$psw', '$enno', '$sem', '$fname', '$lname', '$mo', '$gender', '$filepath', '$addr'
					);";

		if (mysqli_query($con,$query))
		{
	    	header("location:index.php?reg-suc=sucess");
		}
		else
		{
			header("location:register.php?stumsg=failed");
		}
		
	require_once("closeconnection.php");
?>