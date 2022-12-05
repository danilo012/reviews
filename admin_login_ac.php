<?php
	session_start();
	require_once("connection.php");
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$query="SELECT * FROM `admin_login` WHERE email = '$email' AND pass = '$psw'";
	$sql=mysqli_query($con,$query);
	if(mysqli_num_rows($sql) > 0)          
	{
		while($row = mysqli_fetch_assoc($sql))
		{
        	$_SESSION['adminid']=$row["adminid"];
    	}
		header("location:adminpanel/manageclg.php");
	}
	else
	{
		header("location:admin.php?admin-msg=failed");
	}
	require_once("closeconnection.php");
?>