<?php

include_once("connection.php");

$username=$_GET["username"];

$query="select * from vendor where username='$username'";

$table=mysqli_query($dbcon,$query);

$all=array();

while($row=mysqli_fetch_array($table))
{
	$all[]=$row;
}

echo json_encode($all);
	
?>