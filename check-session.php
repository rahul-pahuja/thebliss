<?php
	session_start();
	if(isset($_SESSION["username"])==false)
		header("location:index.php");
?>