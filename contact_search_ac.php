<?php
	require_once("connection.php");

	$clgname=$_POST['college'];
	$query="select * from college_info where collegename LIKE '%$clgname%' and approved=1;";
	$sql=mysqli_query($con,$query);
	if(mysqli_num_rows($sql) > 0)
	{
		while ($row = mysqli_fetch_assoc($sql)) {
			$clgid=$row['collegeid'];
		}
		header("location:collegedetails.php?id=$clgid");
	}
	else
	{
		header("location:contactus.php?no-record");
	}

	require_once("closeconnection.php");
?>