<?php

include_once("connection.php");

include_once("check-session.php");

$customer=$_GET["customer"];

$vendor=$_GET["vendor"];

$query="select customer from wishlist where customer='$customer' and vendor='$vendor'";

$table=mysqli_query($dbcon, $query);

if(mysqli_num_rows($table)==0)
{
	$query="insert into wishlist values('$customer', '$vendor')";
	
	mysqli_query($dbcon, $query);
	
	if(mysqli_error($dbcon)=="")
	{
		echo "Added to Wishlist";
	}
	else
	{
		echo mysqli_error($dbcon);
	}
}
else
{
	echo "Already in Wishlist";
}

?>