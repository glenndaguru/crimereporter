<?php

	// Connection
	$servername = "127.6.180.130";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "evoting";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	mysqli_close($conn);
	
?>