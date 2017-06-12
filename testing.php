<?php

	// Connection
	$servername = "127.6.180.130";
	$username = "admintbjr2MK";
	$password = "n8C785aaSHi7";
	$dbname = "evoting";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		echo "Finally connected"."\n";
	}
	
	$userEmail = "0000000000000";
	$userPass = "1234";
	
	// Selecting User ID, check if user exists
	$sql = "SELECT * FROM Users WHERE userIDNo='".md5($userIDNo)."' AND userPass='".md5($userPass)."'";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));	
	if(mysqli_num_rows($result) > 0)
	{
		$myObj->result = 1;
	}
	else
	{
		$myObj->result = 0;
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	
	
	mysqli_close($conn);
	
?>