<?php

session_start();

include_once("connection.php");

$email=$_GET["email"];

$password=$_GET["password"];

$query="select password from users where email='$email'";

$table=mysqli_query($dbcon, $query);

if(mysqli_num_rows($table)==0)
{
	echo "Sorry, email not registered";
}
else
{
	$row=mysqli_fetch_array($table);
	if($row["password"]==$password)
	{
		echo "1";
		$_SESSION["username"]=substr($email, 0, -10);
	}
	else
		echo "The password you entered is incorrect";
}
?>