<?php

include_once("connection.php");

include_once("check-session.php");

$username="";

$email="";

$name="";

$mobile="";

$address="";

$city="";

$picpath="";

if(isset($_POST["username"]))
	$username=$_POST["username"];

if(isset($_POST["email"]))
	$email=$_POST["email"];

if(isset($_POST["name"]))
	$name=$_POST["name"];

if(isset($_POST["mobile"]))
	$mobile=$_POST["mobile"];

if(isset($_POST["address"]))
	$address=$_POST["address"];

if(isset($_POST["city"]))
	$city=$_POST["city"];

if($_FILES["path"]["tmp_name"]!="")
{
	$tempName=$_FILES['path']['tmp_name'];
	$orgName=$_FILES['path']['name'];
	$picpath="uploads/".$orgName;
	move_uploaded_file($tempName,$picpath);
}

$select="select path from customer where username='$username'";

$table=mysqli_query($dbcon, $select);

if(mysqli_num_rows($table)==0)
{
	if($username!="")
		$query="insert into customer values('$username', '$email', '$name', '$mobile', '$address', '$city', '$picpath')";
}
else
{
	$row=mysqli_fetch_array($table);
	if($picpath=="")
		$query="update customer set email='$email',name='$name',mobile='$mobile',address='$address',city='$city' where username='$username'";
	else
		$query="update customer set email='$email',name='$name',mobile='$mobile',address='$address',city='$city',path='$picpath' where username='$username'";
}

mysqli_query($dbcon, $query);

if(mysqli_error($dbcon))
	echo mysqli_error($dbcon);
else
	echo "Record Submitted";

?>