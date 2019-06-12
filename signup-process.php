<?php

include_once("connection.php");

$email=$_GET["email"];

$query="select email from users where email='$email'";
	
$table=mysqli_query($dbcon, $query);

if(mysqli_num_rows($table)!=0)
{
	echo "Sorry, email already registered";
}
else
{
	$mobile=$_GET["mobile"];

	$password=$_GET["password"];

	$query="insert into users values('$email', '$mobile', '$password', 'customer')";

	mysqli_query($dbcon, $query);

	if(mysqli_error($dbcon)=="")
	{
		echo "1";
	}
	else
	{
		echo mysqli_error($dbcon);
	}
	
	$username=substr($email, 0, -10);
	
	$query="insert into customer values('$username', '$email', '', '$mobile', '', '', 'pics/user.png')";
	
	mysqli_query($dbcon, $query);
}
?>