<?php
	require_once("../connection.php");
	$id=$_REQUEST['id'];
	$query = "UPDATE `college_info` SET `approved` = '1' WHERE `college_info`.`collegeid` = $id;";

	if (mysqli_query($con,$query)) 
	{
		header("location:manageclg.php?suc-approve");
	}
	require_once("../closeconnection.php");
?>