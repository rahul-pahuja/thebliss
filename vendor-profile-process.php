<?php

include_once("connection.php");

include_once("check-session.php");

$username="";

$email="";

$name="";

$mobile="";

$address="";

$city="";

$firm="";

$estd="";

$prevwork="";

$services="";

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

if(isset($_POST["firm"]))
	$firm=$_POST["firm"];

if(isset($_POST["estd"]))
	$estd=$_POST["estd"];

if(isset($_POST["prevwork"]))
	$prevwork=$_POST["prevwork"];

if(isset($_POST["services"]))
{
	foreach($_POST["services"] as $c)
		$services=$services.$c.",";
}

if(isset($_POST["other"]))
{
	$services=$services.$_POST["other"];
	$other=$_POST["other"];
	$other_rows=mysqli_query($dbcon,"select services from other where services='$other'");
	if(mysqli_num_rows($other_rows)==0)
		mysqli_query($dbcon, "insert into other values('$other')");
}

if($_FILES["path"]["tmp_name"]!="")
{
	$tempName=$_FILES['path']['tmp_name'];
	$orgName=$_FILES['path']['name'];
	$picpath="uploads/".$orgName;
	move_uploaded_file($tempName,$picpath);
}

$select="select path from vendor where username='$username'";

$table=mysqli_query($dbcon, $select);

if(mysqli_num_rows($table)==0)
{
	if($picpath=="")
		$query="insert into vendor values('$username', '$email', '$name', '$mobile', '$address', '$city', '$firm', '$estd', '$prevwork', '$services', 'pics/user.png')";
}
else
{
	$row=mysqli_fetch_array($table);
	if($picpath=="")
		$query="update vendor set email='$email',name='$name',mobile='$mobile',address='$address',city='$city',firm='$firm',estd='$estd',prevwork='$prevwork',services='$services' where username='$username'";
	else
		$query="update vendor set email='$email',name='$name',mobile='$mobile',address='$address',city='$city',firm='$firm',estd='$estd',prevwork='$prevwork',services='$services',path='$picpath' where username='$username'";
}

mysqli_query($dbcon, $query);

if(mysqli_error($dbcon))
	echo mysqli_error($dbcon);
else
	echo "Record Submitted";

?>