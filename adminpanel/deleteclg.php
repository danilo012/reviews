<?php
	require_once("../connection.php");
	$id=$_REQUEST['id'];
	$query = "DELETE FROM `college_info` WHERE `college_info`.`collegeid` = $id";

	if (mysqli_query($con,$query)) 
	{
		header("location:manageclg.php?suc");
	}
	require_once("../closeconnection.php");
?>