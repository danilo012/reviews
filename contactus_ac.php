<?php
	$to="studentreview2020@gmail.com";
	$name=$_POST['name'];
	$from=$_POST['email'];
	$subject=$_POST['sub'];
	$msg=$_POST['msg'];
	$headers = "From: ".$from."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$body="Name: ".$name."<br><br>"."E-mail From: ".$from."<br><br>".$msg;

	if(mail($to, $subject,$body,$headers))
	{
		header("location:contactus.php?contactus-suc=success");
	}
	else
	{
		header("location:contactus.php?contactus-fail=failed");
	}
?>