<?php

include_once("connection.php");

include_once("check-session.php");

$username=$_GET["username"];

$query="select * from vendor where username='$username'";

$table=mysqli_query($dbcon,$query);

$table=mysqli_query($dbcon,$query);

$row=mysqli_fetch_array($table);

echo json_encode($row);

?>