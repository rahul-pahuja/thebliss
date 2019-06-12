<?php

include_once("connection.php");

$fun=$_GET["functions"];

$query="select distinct services from functions where function='$fun'";

$table=mysqli_query($dbcon, $query);

$all=array();

while($row=mysqli_fetch_array($table))
{
	$all[]=$row;
}

echo json_encode($all);

?>