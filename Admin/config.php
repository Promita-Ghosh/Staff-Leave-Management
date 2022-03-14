<?php
	$host = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "leave_management";

	// Create database connection
	$mysqli = mysqli_connect($host, $userName, $password, $dbName);
	
	// Check connection
	if(!$mysqli)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

?>
