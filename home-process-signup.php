<?php

include_once("connection.php");

if(isset($_GET["btn"]))
{
	doSignup($dbcon);
}
else
{
	doCheck($dbcon);
}

function doSignup($dbcon)
{
	$email=$_GET["signup-email"];

	$mobile=$_GET["mobile"];

	$password=$_GET["signup-password"];

	$query="insert into users values('$email', '$mobile', '$password')";

	$table=mysqli_query($dbcon, $query);

	if(mysqli_error($dbcon)=="")
	{
		echo "true";
	}
	else
	{
		echo mysqli_error($dbcon);
	}
}

function doCheck($dbcon)
{
	$email=$_GET["signup-email"];
	
	$query="select email from users where email='$email'";
	
	$table=mysqli_query($dbcon, $query);
	
	if(mysqli_num_rows($table)!=0)
	{
		echo "Sorry, Email Already Taken";
	}
	else
	{
		echo "Available";
	}
}
?>