<?php

include_once("connection.php");

include_once("check-session.php");

$customer=$_GET["customer"];

$query="select vendor from wishlist where customer='$customer'";

$table=mysqli_query($dbcon, $query);

$all=array();

while($row=mysqli_fetch_array($table))
{
	$all[]=$row;
}

$usersdata=array();

foreach($all as $user)
{
	$name=$user["vendor"];
	
	$vendor="select * from vendor where username='$name'";

	$table=mysqli_query($dbcon, $vendor);
	
	$usersdata[]=mysqli_fetch_array($table);

}

echo json_encode($usersdata);

?>