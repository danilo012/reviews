 <?php
	session_start();
	require_once("connection.php");
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$query="SELECT * FROM `college_info` WHERE email = '$email' AND pass = '$psw'";
	$sql=mysqli_query($con,$query);
	if(mysqli_num_rows($sql) > 0)          
	{
		while($row = mysqli_fetch_assoc($sql))
		{
        	$_SESSION['collegeid']=$row["collegeid"];
    	}
		header("location:index.php");
	}
	else
	{
		header("location:index.php?clg-msg=failed");
	}
	require_once("closeconnection.php");
?>