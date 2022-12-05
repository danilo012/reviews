<?php
	session_start();
	unset($_SESSION['studentid']);
	unset($_SESSION['collegeid']);	
	header('location:index.php');
?>