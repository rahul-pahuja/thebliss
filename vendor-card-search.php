<?php

include_once("connection.php");

include_once("check-session.php");

$card="select * from vendor";

$table_card=mysqli_query($dbcon, $card);

$card_all=array();

while($row=mysqli_fetch_array($table_card))
{
	$card_all[]=$row;
}

$function="select distinct function from functions";

$table_function=mysqli_query($dbcon, $function);

$function_all=array();

while($row=mysqli_fetch_array($table_function))
{
	$function_all[]=$row;
}

$services="select distinct services from functions";

$table_services=mysqli_query($dbcon, $services);

$services_all=array();

while($row=mysqli_fetch_array($table_services))
{
	$services_all[]=$row;
}

$cities="select distinct city from vendor";

$table_cities=mysqli_query($dbcon, $cities);

$cities_all=array();

while($row=mysqli_fetch_array($table_cities))
{
	$cities_all[]=$row;
}

echo '{"cards":'.json_encode($card_all).', "functions":'.json_encode($function_all).', "services":'.json_encode($services_all).', "cities":'.json_encode($cities_all).'}';

?>