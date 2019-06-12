<?php

include_once("connection.php");

if(isset($_GET["btn"]))
{
	doLogin($dbcon);
}

function doLogin($dbcon)
{
	$email=$_GET["login-email"];
	
	$password=$_GET["login-password"];
	
	$query="select password from users where email='$email'";
	
	$table=mysqli_query($dbcon, $query);

	if(mysqli_num_rows($table)==0)
	{
		echo "Email not registered";
	}
	else
	{
		$row=mysqli_fetch_array($table);
		if($row["password"]==$password)
		{
			echo "Logged in";
		}
	}
}
?>