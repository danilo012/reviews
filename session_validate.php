<?php
	session_start();
	if(!isset($_SESSION['uname']))
	{
		header('location:Login.php');
	}
?>